<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Kategori;
use App\Models\Supplier;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Books extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $book, $isbn, $judul, $penulis,$penerbit, $kategori_id, $stok, $harga, $foto, $sinopsis, $supplier_id, $book_id, $search, $kat, $sup;
    public $isModal;
    public function render()
    {
       
        $kats = Kategori::all();
        $sups = Supplier::all();
        $search = '%'.$this->search.'%';
        $books = Book::where('judul','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.books', compact('kats', 'sups'),['books'=> $books]) ->layout('layouts.template');
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
        $this->kategori_id ='';
        $this->supplier_id ='';
        $this->stok ='';
        $this->harga ='';
        $this->foto ='';
        $this->sinopsis ='';
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
            'isbn'=> 'required',
            'judul'=> 'required',
            'penulis'=> 'required',
            'penerbit'=> 'required',
            'kategori_id'=> 'required',
            'supplier_id'=> 'required',
            'stok'=> 'required|integer',
            'harga'=> 'required|integer',
            'sinopsis'=> 'required',
            'foto'=> 'required|image|max:1024'
        ],
        [
            'isbn.required'=>'ISBN wajib di isi!',
            'judul.required'=>'Judul wajib di isi!',
            'penulis.required'=>'Nama Penulis wajib di isi!',
            'penerbit.required'=>'Nama Penerbit wajib di isi!',
            'kategori_id.required'=>'Kategori wajib di isi!',
            'stok.required'=>'Stok wajib di isi!',
            'stok.integer'=>'Stok harus bertipe integer!',
            'harga.required'=>'Harga wajib di isi!',
            'harga.integer'=>'Harga harus bertipe integer!',
            'foto.required'=>'Foto wajib di isi!',
            'foto.max'=>'ukurn foto max 1024 KB!',
            'sinopsis.required'=>'Sinopsis wajib di isi!',
            'supplier_id.required'=>'Nama supplier_id wajib di isi!'
        ]);

        if(!empty($this->foto))
        {
            $this->foto->store('foto','public');
        }

        Book::updateOrCreate(
            ['id' => $this->book_id], 
            [
             'isbn'=>$this->isbn,
             'judul'=>$this->judul,
             'penulis'=>$this->penulis,
             'penerbit'=>$this->penerbit,
             'kategori_id'=> $this->kategori_id,
             'supplier_id'=> $this->supplier_id,
             'stok'=> $this->stok,
             'harga'=> $this->harga,
             'foto'=> $this->foto->hashName(),
             'sinopsis'=> $this->sinopsis,

            ]
            );

            session()->flash('message', $this->book_id ? 'Data berhasil diperbarui':'Data berhasil ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }
    public function edit($id)
    {
        $kats = Kategori::all();
        $sups = Supplier::all();
        $book = Book::find($id);
        $this->book_id = $id;
        $this->isbn = $book ->isbn;
        $this->judul =$book->judul;
        $this->penulis  =$book->penulis;
        $this->penerbit =$book->penerbit;
        $this->kategori_id =$book->kategori_id;
        $this->supplier_id =$book->supplier_id;
        $this->stok=$book->stok;
        $this->harga=$book->harga;
        $this->sinopsis=$book->sinopsis;
        $this->foto=$book->foto;
        $this->openModal();

    }
    public function delete($id)
    {
        $book = Book::find($id);
        $book-> delete();
      session()->flash('message', ' Data berhasil Dihapus');

    }

}
