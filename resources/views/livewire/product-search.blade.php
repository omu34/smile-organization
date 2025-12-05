<div class="bg-white p-4 rounded shadow">
  <div class="flex gap-2 mb-3">
    <input wire:model.defer="query" type="text" placeholder="Search products..." class="flex-1 border rounded p-2" />
    <button wire:click="search" class="bg-indigo-600 text-white px-4 py-2 rounded">Search</button>
  </div>

  <div class="space-y-2">
    @forelse($results as $r)
      <div class="p-3 border rounded">
        <div class="font-semibold">{{ $r['title'] }} — ${{ number_format($r['price'],2) }}</div>
        <div class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($r['description'], 200) }}</div>
      </div>
    @empty
      <div class="text-gray-500">No results yet</div>
    @endforelse
  </div>
</div>
