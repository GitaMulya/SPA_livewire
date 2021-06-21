<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;


class Kategoris extends Component
{
    use WithPagination;
    public $kategori, $kat_id, $search;
    public $isModal;
    public function render()
    {
        $search = '%'.$this->search.'%';
        // $this->books = Book::with('kategori')->get();
        // $this->kat = Kategori::all();
        // return view('livewire.books')->layout('layouts.template');
      
        // return view('livewire.kategoris',[
        //     $this->kategoris = Kategori::where('kategori','LIKE', $search)
        //     ->orderBy('created_at','DESC')->get()
        // ])
        // ->layout('layouts.template');
        $kategoris = Kategori::where('kategori','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.kategoris', ['kategoris'=> $kategoris]) ->layout('layouts.template');
    }
    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
      
        $this->kategori ='';
        
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
            'kategori'=> 'required'
        ],
        [
            'kategori.required'=>'Kategori wajib di isi!',
        ]);

        Kategori::updateOrCreate(
            ['id' => $this->kat_id], 
            [
             'kategori'=> $this->kategori,
            ]);

            session()->flash('message', $this->kat_id ? 'Data berhasil diperbarui':'Data berhasil ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $this->kat_id = $id;
        $this->kategori = $kategori ->kategori;
        $this->openModal();
    }
    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori-> delete();
      session()->flash('message', ' Data berhasil Dihapus');

    }

}
