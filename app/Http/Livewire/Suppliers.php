<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
class Suppliers extends Component
{
    use WithPagination;
    public $supplier, $nama, $no_tlp, $alamat_email, $alamat_sup, $sup_id, $search;
    public $isModal;
    public function render()
    {
        $search = '%'.$this->search.'%';
        // $this->books = Book::with('kategori')->get();
        // $this->kat = Kategori::all();
        // return view('livewire.books')->layout('layouts.template');
      
        // return view('livewire.suppliers',[
        //     $this->suppliers = Supplier::where('nama','LIKE', $search)
        //     ->orWhere('no_tlp','LIKE',$search)
        //     ->orWhere('alamat_email','LIKE',$search)
        //     ->orWhere('alamat_sup','LIKE',$search)
        //     ->orderBy('created_at','DESC')->get()
        // ])
        // ->layout('layouts.template');
        $suppliers = Supplier::where('nama','LIKE',$search)
             ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.suppliers', ['suppliers'=> $suppliers]) ->layout('layouts.template');
    }
    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
      
        $this->nama ='';
        $this->no_tlp ='';
        $this->alamat_email ='';
        $this->alamat_sup ='';
        
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
            'nama'=> 'required',
            'no_tlp'=> 'required',
            'alamat_email'=> 'required',
            'alamat_sup'=> 'required'
        ],
        [
            'nama.required'=>'Nama wajib di isi!',
            'no_tlp.required'=>'Nomor telepon wajib di isi!',
            'alamat_email.required'=>'Alamat email wajib di isi!',
            'alamat_sup.required'=>'Alamat supplier wajib di isi!'
        ]);

        Supplier::updateOrCreate(
            ['id' => $this->sup_id], 
            [
             'nama'=> $this->nama,
             'no_tlp'=> $this->no_tlp,
             'alamat_email'=> $this->alamat_email,
             'alamat_sup'=> $this->alamat_sup,
            ]);

            session()->flash('message', $this->sup_id ? 'Data berhasil diperbarui':'Data berhasil ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $this->sup_id = $id;
        $this->nama = $supplier ->nama;
        $this->no_tlp = $supplier ->no_tlp;
        $this->alamat_email = $supplier ->alamat_email;
        $this->alamat_sup = $supplier ->alamat_sup;
        $this->openModal();
    }
    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier-> delete();
        session()->flash('message', ' Data berhasil Dihapus');

    }
}
