<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GallerySection extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryFilter = null;

    protected $listeners = ['galleryUpdated' => '$refresh'];

    public function render()
    {
        $query = Gallery::query();

        if ($this->categoryFilter) {
            $query->where('category', $this->categoryFilter);
        }

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%");
        }

        return view('livewire.gallery-section', [
            'galleries' => $query->latest()->paginate(9),
        ]);
    }
}
