<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = ["barang_id", "user_id", "jml_brg_keluar", "total", "id_peminjam"];


    public function barang(){

        return $this->belongsTo('App\Models\Barang');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
