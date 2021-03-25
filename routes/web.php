<?php

use App\Http\Livewire\Admin\AdminAddCategoryc;
use App\Http\Livewire\Admin\AdminAddProductc;
use App\Http\Livewire\Admin\AdminCategoryc;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminEditCategoryc;
use App\Http\Livewire\Admin\AdminEditProductc;
use App\Http\Livewire\Admin\AdminProductc;
use App\Http\Livewire\Cartc;
use App\Http\Livewire\Categoryc;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Details;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Searchc;
use App\Http\Livewire\Shop;
use App\Http\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',HomeComponent::class);
Route::get('/shop',Shop::class);
Route::get('/cart',Cartc::class)->name('product.cart');
Route::get('/checkout',Checkout::class);
Route::get('/product/{slug}',Details::class)->name('product.details');
Route::get('/product-category/{category_slug}',Categoryc::class)->name('product.category');
Route::get('/search',Searchc::class)->name('product.search');
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryc::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryc::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryc::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductc::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductc::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductc::class)->name('admin.editproduct');

});

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboard::class)->name('user.dashboard');
});
