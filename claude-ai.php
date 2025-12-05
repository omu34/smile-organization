Content is user-generated and unverified.
<?php

// 1. Install required packages
// composer require guzzlehttp/guzzle

// 2. Add to .env file:
// ANTHROPIC_API_KEY=your_api_key_here

// 3. Create Claude Service
// app/Services/ClaudeService.php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ClaudeService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl = 'https://api.anthropic.com/v1';

    public function __construct()
    {
        $this->apiKey = config('services.claude.api_key');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'x-api-key' => $this->apiKey,
                'anthropic-version' => '2023-06-01',
                'content-type' => 'application/json',
            ]
        ]);
    }

    /**
     * Send a message to Claude
     */
    public function sendMessage(
        string $message,
        array $options = []
    ): array {
        $model = $options['model'] ?? 'claude-sonnet-4-20250514';
        $maxTokens = $options['max_tokens'] ?? 1024;
        $temperature = $options['temperature'] ?? 1;
        $system = $options['system'] ?? null;
        $conversationHistory = $options['conversation_history'] ?? [];

        // Build messages array
        $messages = $conversationHistory;
        $messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        $payload = [
            'model' => $model,
            'max_tokens' => $maxTokens,
            'temperature' => $temperature,
            'messages' => $messages
        ];

        if ($system) {
            $payload['system'] = $system;
        }

        try {
            $response = $this->client->post('/messages', [
                'json' => $payload
            ]);

            $data = json_decode($response->getBody(), true);

            return [
                'success' => true,
                'content' => $data['content'][0]['text'] ?? '',
                'usage' => $data['usage'] ?? [],
                'model' => $data['model'] ?? $model,
                'stop_reason' => $data['stop_reason'] ?? null,
                'full_response' => $data
            ];
        } catch (\Exception $e) {
            Log::error('Claude API Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Stream a message from Claude
     */
    public function streamMessage(
        string $message,
        callable $callback,
        array $options = []
    ): void {
        $model = $options['model'] ?? 'claude-sonnet-4-20250514';
        $maxTokens = $options['max_tokens'] ?? 1024;
        $system = $options['system'] ?? null;

        $payload = [
            'model' => $model,
            'max_tokens' => $maxTokens,
            'messages' => [
                ['role' => 'user', 'content' => $message]
            ],
            'stream' => true
        ];

        if ($system) {
            $payload['system'] = $system;
        }

        try {
            $response = $this->client->post('/messages', [
                'json' => $payload,
                'stream' => true
            ]);

            $body = $response->getBody();
            while (!$body->eof()) {
                $line = $this->readLine($body);
                if (strpos($line, 'data: ') === 0) {
                    $data = json_decode(substr($line, 6), true);
                    if ($data && isset($data['delta']['text'])) {
                        $callback($data['delta']['text']);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('Claude Streaming Error: ' . $e->getMessage());
            throw $e;
        }
    }

    private function readLine($stream): string
    {
        $line = '';
        while (!$stream->eof()) {
            $char = $stream->read(1);
            if ($char === "\n") {
                break;
            }
            $line .= $char;
        }
        return $line;
    }

    /**
     * Analyze an image with Claude (Vision)
     */
    public function analyzeImage(
        string $imageBase64,
        string $mediaType,
        string $prompt,
        array $options = []
    ): array {
        $model = $options['model'] ?? 'claude-sonnet-4-20250514';
        $maxTokens = $options['max_tokens'] ?? 1024;

        $payload = [
            'model' => $model,
            'max_tokens' => $maxTokens,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'image',
                            'source' => [
                                'type' => 'base64',
                                'media_type' => $mediaType,
                                'data' => $imageBase64
                            ]
                        ],
                        [
                            'type' => 'text',
                            'text' => $prompt
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = $this->client->post('/messages', [
                'json' => $payload
            ]);

            $data = json_decode($response->getBody(), true);

            return [
                'success' => true,
                'content' => $data['content'][0]['text'] ?? '',
                'usage' => $data['usage'] ?? []
            ];
        } catch (\Exception $e) {
            Log::error('Claude Vision Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}

// 4. Create Livewire Component for Chat
// app/Livewire/ClaudeChat.php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ClaudeService;
use Livewire\Attributes\On;

class ClaudeChat extends Component
{
    public $message = '';
    public $messages = [];
    public $isLoading = false;
    public $conversationId;

    protected $claudeService;

    public function boot(ClaudeService $claudeService)
    {
        $this->claudeService = $claudeService;
    }

    public function mount()
    {
        $this->conversationId = uniqid('conv_');
        $this->loadConversation();
    }

    public function loadConversation()
    {
        // Load from session or database
        $this->messages = session("claude_conversation_{$this->conversationId}", []);
    }

    public function sendMessage()
    {
        if (empty(trim($this->message))) {
            return;
        }

        $this->isLoading = true;

        // Add user message
        $userMessage = [
            'role' => 'user',
            'content' => $this->message,
            'timestamp' => now()->toDateTimeString()
        ];

        $this->messages[] = $userMessage;

        // Build conversation history for Claude
        $conversationHistory = collect($this->messages)
            ->map(fn($msg) => [
                'role' => $msg['role'],
                'content' => $msg['content']
            ])
            ->toArray();

        // Send to Claude
        $response = $this->claudeService->sendMessage($this->message, [
            'conversation_history' => array_slice($conversationHistory, 0, -1) // Exclude the last message we just added
        ]);

        if ($response['success']) {
            $assistantMessage = [
                'role' => 'assistant',
                'content' => $response['content'],
                'timestamp' => now()->toDateTimeString(),
                'usage' => $response['usage']
            ];

            $this->messages[] = $assistantMessage;
        } else {
            $this->messages[] = [
                'role' => 'error',
                'content' => 'Error: ' . $response['error'],
                'timestamp' => now()->toDateTimeString()
            ];
        }

        // Save conversation
        session(["claude_conversation_{$this->conversationId}" => $this->messages]);

        $this->message = '';
        $this->isLoading = false;

        // Scroll to bottom
        $this->dispatch('message-sent');
    }

    public function clearChat()
    {
        $this->messages = [];
        session()->forget("claude_conversation_{$this->conversationId}");
    }

    public function render()
    {
        return view('livewire.claude-chat');
    }
}

// 5. Create Livewire View
// resources/views/livewire/claude-chat.blade.php
/*
<div class="flex flex-col h-screen max-w-4xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Chat with Claude</h2>
        <button
            wire:click="clearChat"
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
        >
            Clear Chat
        </button>
    </div>

    <div class="flex-1 overflow-y-auto mb-4 space-y-4 bg-gray-50 rounded-lg p-4" id="chat-container">
        @foreach($messages as $msg)
            <div class="flex {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-[80%] rounded-lg p-4 {{ $msg['role'] === 'user' ? 'bg-blue-500 text-white' : ($msg['role'] === 'error' ? 'bg-red-100 text-red-800' : 'bg-white border border-gray-200') }}">
                    <div class="text-sm mb-1 {{ $msg['role'] === 'user' ? 'text-blue-100' : 'text-gray-500' }}">
                        {{ $msg['role'] === 'user' ? 'You' : ($msg['role'] === 'error' ? 'Error' : 'Claude') }}
                    </div>
                    <div class="whitespace-pre-wrap">{{ $msg['content'] }}</div>
                    @if(isset($msg['usage']))
                        <div class="text-xs mt-2 {{ $msg['role'] === 'user' ? 'text-blue-100' : 'text-gray-400' }}">
                            Tokens: {{ $msg['usage']['input_tokens'] ?? 0 }} in, {{ $msg['usage']['output_tokens'] ?? 0 }} out
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        @if($isLoading)
            <div class="flex justify-start">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex space-x-2">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="flex gap-2">
        <input
            type="text"
            wire:model="message"
            wire:keydown.enter="sendMessage"
            placeholder="Type your message..."
            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            @disabled($isLoading)
        >
        <button
            wire:click="sendMessage"
            @disabled($isLoading)
            class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed"
        >
            Send
        </button>
    </div>

    @script
    <script>
        $wire.on('message-sent', () => {
            setTimeout(() => {
                const container = document.getElementById('chat-container');
                container.scrollTop = container.scrollHeight;
            }, 100);
        });
    </script>
    @endscript
</div>
*/

// 6. Create Filament Resource for AI Conversations
// app/Filament/Resources/ClaudeConversationResource.php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ClaudeConversation;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class ClaudeConversationResource extends Resource
{
    protected static ?string $model = ClaudeConversation::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'AI Conversations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('system_prompt')
                    ->label('System Prompt (Optional)')
                    ->rows(3),
                Forms\Components\Select::make('model')
                    ->options([
                        'claude-sonnet-4-20250514' => 'Claude Sonnet 4',
                        'claude-opus-4-20250514' => 'Claude Opus 4',
                        'claude-haiku-4-20250514' => 'Claude Haiku 4',
                    ])
                    ->default('claude-sonnet-4-20250514')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('model')
                    ->badge()
                    ->sortable(),
                TextColumn::make('message_count')
                    ->label('Messages')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ClaudeConversationResource\Pages\ListClaudeConversations::route('/'),
            'create' => \App\Filament\Resources\ClaudeConversationResource\Pages\CreateClaudeConversation::route('/create'),
            'edit' => \App\Filament\Resources\ClaudeConversationResource\Pages\EditClaudeConversation::route('/{record}/edit'),
            'view' => \App\Filament\Resources\ClaudeConversationResource\Pages\ViewClaudeConversation::route('/{record}'),
        ];
    }
}

// 7. Create Model for storing conversations (optional)
// app/Models/ClaudeConversation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaudeConversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'messages',
        'model',
        'system_prompt',
        'message_count',
        'total_tokens_used'
    ];

    protected $casts = [
        'messages' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// 8. Create Migration
// database/migrations/xxxx_create_claude_conversations_table.php
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claude_conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->json('messages');
            $table->string('model')->default('claude-sonnet-4-20250514');
            $table->text('system_prompt')->nullable();
            $table->integer('message_count')->default(0);
            $table->integer('total_tokens_used')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claude_conversations');
    }
};
*/

// 9. Add to config/services.php
/*
'claude' => [
    'api_key' => env('ANTHROPIC_API_KEY'),
],
*/

// 10. Create Filament Custom Page for Chat Interface
// app/Filament/Pages/ClaudeChat.php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ClaudeChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static string $view = 'filament.pages.claude-chat';
    protected static ?string $navigationLabel = 'AI Chat';
    protected static ?string $title = 'Chat with Claude AI';
}

// 11. Create view for Filament page
// resources/views/filament/pages/claude-chat.blade.php
/*
<x-filament-panels::page>
    @livewire('claude-chat')
</x-filament-panels::page>
*/
