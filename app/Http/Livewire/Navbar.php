<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class Navbar extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'cartAdded' => 'updateCartTotal',
        'bookRemoved'=> 'updateCartTotal',
        'clearCart'=> 'updateCartTotal',
    ];

    public function mount()
    {
        $this->cartTotal = count(Cart::get()['books']);
    }
    public function render()
    {
        return view('livewire.navbar');
    }

    public function updateCartTotal()
    {
        $this->cartTotal = count(Cart::get()['books']);
    }
}
