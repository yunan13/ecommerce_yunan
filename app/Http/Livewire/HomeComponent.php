<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $products = Product::all();
        $category = Category::all();
        $product = Product::inRandomOrder()->limit(7)->get();
        return view('livewire.home-component',['product'=>$product,'products'=>$products,'category'=>$category])->layout('layouts.base');
    }
}
