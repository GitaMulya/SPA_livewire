<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'no_tlp', 'alamat_email', 'alamat_sup'];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    use HasFactory;
}
