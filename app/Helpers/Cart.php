<?php

namespace App\Helpers;

use App\Models\Book;


class Cart
{
    public function __construct()
    {
        if ($this->get() === null)
        {
            $this->set($this->empty());
        }
    }

    public function add(Book $book)
    {
        $cart = $this->get();

        array_push($cart['books'], $book);

        $this->set($cart);
    }

    public function remove(int $bookId)
    {
        $cart = $this->get();
        
        array_splice($cart['books'], array_search($bookId, array_column($cart['books'], 'id')), 1);

        $this->set($cart);
    }
    
    public function clear()
    {
        $this->set($this->empty());
    }

    public function empty()
    {
        return [
            'books'=>[],
        ];
    }

    public function get()
    {
        return session()->get('cart');
    }

    public function set($cart)
    {
        session()->put('cart', $cart);
    }
}