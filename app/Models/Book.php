<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['isbn', 'judul', 'penulis', 'penerbit', 'stok', 'harga', 'foto', 'sinopsis', 'supplier_id', 'kategori_id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
