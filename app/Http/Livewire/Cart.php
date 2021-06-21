<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Book as BookModel;
use App\Models\Kategori;
use App\Models\Supplier;

class Cart extends Component
{
   
    public function render()
    {
        
        return view('livewire.cart', compact('books'))->layout('layouts.template_home');
    }
   
}
