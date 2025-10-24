<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Gallery;

class GallerySection extends Component
{
    public $search = '';
    public $categoryFilter = '';
    public $selectedGalleryId = null;
    public $galleryIds = [];

    #[On('echo:gallery,GalleryUpdated')]  // listens to Reverb event
    public function refreshGallery()
    {
        $this->dispatch('$refresh');
    }

    public function updated($property)
    {
        if (in_array($property, ['search', 'categoryFilter'])) {
            $this->selectedGalleryId = null;
        }
    }

    public function showModal($galleryId)
    {
        $this->selectedGalleryId = $galleryId;
        $this->dispatch('show-modal');
    }



    public function closeModal()
    {
        $this->selectedGalleryId = null;
        $this->dispatch('close-modal');
    }

    public function nextImage()
    {
        if (!$this->selectedGalleryId) return;

        $index = array_search($this->selectedGalleryId, $this->galleryIds);
        if ($index !== false && $index < count($this->galleryIds) - 1) {
            $this->selectedGalleryId = $this->galleryIds[$index + 1];
        }
    }

    public function prevImage()
    {
        if (!$this->selectedGalleryId) return;

        $index = array_search($this->selectedGalleryId, $this->galleryIds);
        if ($index !== false && $index > 0) {
            $this->selectedGalleryId = $this->galleryIds[$index - 1];
        }
    }

    public function render()
    {
        $query = Gallery::query()
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->categoryFilter, fn($q) => $q->where('category', $this->categoryFilter))
            ->orderBy('created_at', 'desc');

        $galleries = $query->get();
        $this->galleryIds = $galleries->pluck('id')->toArray();

        $groupedGalleries = $galleries->groupBy('category');
        $categories = Gallery::select('category')->distinct()->pluck('category');

        $selectedGallery = $this->selectedGalleryId
            ? Gallery::find($this->selectedGalleryId)
            : null;

        return view('livewire.gallery-section', [
            'groupedGalleries' => $groupedGalleries,
            'categories' => $categories,
            'selectedGallery' => $selectedGallery,
        ]);
    }
}
