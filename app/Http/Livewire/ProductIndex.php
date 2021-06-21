<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $search = '%'.$this->search.'%';
        $books = Book::where('judul','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(12);
        return view('livewire.product-index', compact('books'),['books'=> $books]) ->layout('layouts.template_home');
    }

    public function addToCart(int $bookId)
    {
        Cart::add(Book::where('id', $bookId)->first());

        $this->emit('cartAdded');
    }
}
