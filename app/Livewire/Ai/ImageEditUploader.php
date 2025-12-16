<?php

namespace App\Livewire\Ai;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use App\Models\GeneratedAsset;
use App\Jobs\GenerateImageEditJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageEditUploader extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $image = null;
    public ?string $prompt = '';
    public bool $loading = false;

    public function rules()
    {
        return [
            'image' => 'required|image|max:10240', // 10MB
            'prompt' => 'required|string|min:3|max:1000',
        ];
    }

    public function submit()
{
    $this->validate();

    if (! Auth::check()) {
        $this->addError('image','Authentication required.');
        return;
    }

    $this->loading = true;

    $disk = config('filesystems.default','public');
    $path = $this->image->storePublicly('ai-uploads', $disk);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $record = $user->generatedAssets()->create([
        'type' => 'image-edit',
        'prompt' => $this->prompt,
        'status' => 'pending',
        'input_path' => $path,
    ]);

        $record->update(['status' => 'processing']);

        // dispatch job
        dispatch(new GenerateImageEditJob($record, $path, ['size'=>env('AI_DEFAULT_SIZE','1024x1024')]));

        $this->loading = false;
        $this->image = null;
        $this->prompt = '';

        session()->flash('message','Image edit submitted — will appear when done.');
    }

    public function render()
    {
        return view('livewire.ai.image-edit-uploader');
    }
}
