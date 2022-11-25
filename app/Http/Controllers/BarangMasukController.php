<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{

    public function index($id)
    {

        // select byId
        $barang = Barang::findOrFail($id); // result {}

        $barangmasuk = BarangMasuk::with(['barang', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

//        $barangmasuk = $barangmasuk[0];

        return view("layout.barang.show", compact(["barang","barangmasuk"]));

    }

}
