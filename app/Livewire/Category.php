<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use App\Models\Order;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Category extends Component
{
    use WithFileUploads;

    public $fileName, $orders, $category, $categories, $categoryID, $name, $description, $product, $id, $search, $attachment, $products;
    public $checkCreate = false;
    public function render()
    {
        $this->orders = Order::all();
        $this->categories = ModelsCategory::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->get();
        return view('livewire.category',[
            'categories' => $this->categories,
            'orders' => $this->orders,
        ]);
    }

    public function store()
    {
        $this->validate([
            'attachment' => 'nullable|file|max:1024', // Max size in KB
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        $this->fileName = 'No attachment'; // Default value for the attachment
        if ($this->attachment) {
            $this->fileName = $this->name . '-' . now()->format('Y-m-d') . '-' . $this->attachment->getClientOriginalName();
            $this->attachment->storeAs('category', $this->fileName, 'public');
        }

        ModelsCategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'attachment'=>$this->fileName
        ]);
        // disipatch an event to close the modal
        $this->dispatch('closeModal');
        $this->checkCreate = false;
        $this->reset('name', 'description', 'attachment');
    }

    public function edit($id)
    {
        $this->category = ModelsCategory::findOrFail($id);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->categoryID = $id;

        $this->reset('name', 'description');
    }

    public function update()
    {
        $this->category = ModelsCategory::findOrFail($this->categoryID);
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset('name', 'description','categoryID');
    }
    public function delete($id)
    {
        $this->category = ModelsCategory::findOrFail($id);
        $this->category->delete();
    }

    public function show($id)
    {
        $this->products = Product::all();
        $this->category = ModelsCategory::findOrFail($id);
        return view('modal.category.show', compact('category', 'products'));
    }

    public function create()
    {
        $this->checkCreate = true;
    }
}
