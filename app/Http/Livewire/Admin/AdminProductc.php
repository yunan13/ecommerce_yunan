<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use livewire\WithPagination;

class AdminProductc extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $category = Product::find($id);
        $category->delete();
        session()->flash('message','Product has been deleted success');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-productc',['products'=>$products])->layout('layouts.base');
    }
}
