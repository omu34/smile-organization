<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\OpenAIService;

class ProductSearch extends Component
{
    public string $query = '';
    public array $results = [];
    public bool $aiRank = true;

    public function search(OpenAIService $ai)
    {
        if (!trim($this->query)) {
            $this->results = [];
            return;
        }

        $collection = $ai->searchProducts($this->query, $this->aiRank, 20);

        $this->results = $collection->map(fn($p) => [
            'id'=>$p->id,
            'title'=>$p->title,
            'price'=>$p->price,
            'description'=>$p->description,
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
