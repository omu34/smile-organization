<?php
// app/Livewire/GallerySection.php
namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GallerySection extends Component
{
    public $search = '';
    public $categoryFilter = '';
    public $selectedGalleryId = null;
    public $galleryIds = [];

    public function updated($property)
    {
        if (in_array($property, ['search', 'categoryFilter'])) {
            $this->selectedGalleryId = null;
        }
    }

    public function showModal($galleryId)
    {
        $this->selectedGalleryId = $galleryId;
    }

    public function closeModal()
    {
        $this->selectedGalleryId = null;
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

        return view('livewire.gallery-section', compact('groupedGalleries', 'categories', 'selectedGallery'));
    }
}
