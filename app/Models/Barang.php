<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ["kategori_id", "namabarang", "harga", "stok"];

//    protected $hidden = ["created_at", "updated_at"]; // data akan di hidden

    // relasi one to many
    public function kategori(){

        return $this->belongsTo('App\Models\Kategori');
    }

}
