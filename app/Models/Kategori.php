<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = "id";
    protected $fillable = ['kategori'];
    use HasFactory;
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
