<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Books;
use App\Http\Livewire\Kategoris;
use App\Http\Livewire\Suppliers;
use App\Http\Livewire\ProductIndex;
use App\Http\Livewire\Cart;
use App\Http\Livewire\CartIndex;
use App\Http\Livewire\Checkout;
use App\Models\Book;

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

Route::get('/', ProductIndex::class)->name('produk.index');

Route::group(['middleware'=> ['auth:sanctum', 'verified', 'accessrole',]],function() {
    Route::get('stokbuku', Books::class)->name('stokbuku');
    Route::get('kategoribuku', Kategoris::class)->name('kategoribuku');
    Route::get('supplierbuku', Suppliers::class)->name('supplierbuku');
    Route::get('/carts', CartIndex::class)->name('cart.index');
    Route::get('/checkout', Checkout::class)->name('checkout');
});