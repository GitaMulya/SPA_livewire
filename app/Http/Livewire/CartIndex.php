<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Facades\Cart;
use Livewire\Component;

class CartIndex extends Component
{
    public $cart, $totalBarang, $totalHarga = 0, $standarShip = 40000, $regularShip = 60000, $ongkir;
    public $cartTotal = 0;


    public function mount()
    {
        $this->cart = Cart::get();
    }

    public function render()
    {
        $this->cartTotal = count(Cart::get()['books']);
        $this->totalBarang = Cart::get()['books'];
        foreach($this->totalBarang as $barang){
            $this->totalHarga += $barang->harga + $this->ongkir;
        }
        return view('livewire.cart-index')->layout('layouts.shopcart');
    }

    public function removeItem($bookId)
    {
       Cart::remove($bookId);
       $this->cart = Cart::get();
       $this->emit('bookRemoved');
       

    }

    public function checkout(){
        Cart::clear();
        $this->emit('clearCart');
        $this->cart = Cart::get();
    }
}
