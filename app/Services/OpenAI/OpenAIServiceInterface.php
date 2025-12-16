<?php
// app/Services/OpenAI/OpenAIServiceInterface.php
namespace App\Services\OpenAI;

use App\Models\GeneratedAsset;

interface OpenAIServiceInterface
{
    public function generateText(string $prompt, ?array $options = []): array;
    public function generateImage(string $prompt, ?array $options = []): array;
}
