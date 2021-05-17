<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;


class Books extends Component
{
    public $books, $isbn, $judul, $penulis,$penerbit, $kategori, $stok, $harga, $book_id;
    public $isModal;
    public function render()
    {
        $this->books = Book::orderBy('created_at','DESC')->get();
        return view('livewire.books');
    }
    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
        $this->isbn ='';
        $this->judul ='';
        $this->penulis ='';
        $this->penerbit ='';
        $this->kategori ='';
        $this->stok ='';
        $this->harga ='';
        $this->book_id='';
    }
    public function openModal()
    {
        $this->isModal = true;
       
    }
    public function closeModal()
    {
        $this->isModal = false;
       
    }
    public function store()
    {
        $this->validate([
            'isbn'=> 'required|string',
            'judul'=> 'required|string',
            'penulis'=> 'required|string',
            'penerbit'=> 'required|string',
            'kategori'=> 'required| string',
            'stok'=> 'required| integer',
            'harga'=> 'required| integer'
        ]);

        Book::updateOrCreate(
            ['id' => $this->book_id], 
            [
             'isbn'=>$this->isbn,
             'judul'=>$this->judul,
             'penulis'=>$this->penulis,
             'penerbit'=>$this->penerbit,
             'kategori'=> $this->kategori,
             'stok'=> $this->stok,
             'harga'=> $this->harga

            ]
            );

            session()->flash('message', $this->book_id ? $this-> judul . ' Data berhasil diperbarui':$this->judul . ' Data berhasil ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }
    public function edit($id)
    {
        $book = Book::find($id);
        $this->book_id = $id;
        $this->isbn = $book ->isbn;
        $this->judul =$book->judul;
        $this->penulis  =$book->penulis;
        $this->penerbit =$book->penerbit;
        $this->kategori =$book->kategori;
        $this->stok=$book->stok;
        $this->harga=$book->harga;
        $this->openModal();

    }
    public function delete($id)
    {
        $book = Book::find($id);
        $book-> delete();
      session()->flash('message', $book->judul . ' Data berhasil Dihapus');

    }

}
