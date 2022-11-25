<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {

        $waktu = Carbon::now();
        $time = Carbon::parse($waktu)->translatedFormat('l, d F Y H:i');

        $user = User::count();
        $kategori = Kategori::count();
        $barang = Barang::count();

        $barangMasuk = BarangMasuk::count();
        $barangKeluar = BarangKeluar::count();

        $masuk_jan = BarangMasuk::whereMonth('created_at', '01')->count();
        $masuk_feb = BarangMasuk::whereMonth('created_at', '02')->count();
        $masuk_mar = BarangMasuk::whereMonth('created_at', '03')->count();
        $masuk_apr = BarangMasuk::whereMonth('created_at', '04')->count();
        $masuk_mei = BarangMasuk::whereMonth('created_at', '05')->count();
        $masuk_jun = BarangMasuk::whereMonth('created_at', '06')->count();
        $masuk_jul = BarangMasuk::whereMonth('created_at', '07')->count();
        $masuk_agu = BarangMasuk::whereMonth('created_at', '08')->count();
        $masuk_sep = BarangMasuk::whereMonth('created_at', '09')->count();
        $masuk_oct = BarangMasuk::whereMonth('created_at', '10')->count();
        $masuk_nov = BarangMasuk::whereMonth('created_at', '11')->count();
        $masuk_des = BarangMasuk::whereMonth('created_at', '12')->count();

        $keluar_jan = BarangKeluar::whereMonth('created_at', '01')->count();
        $keluar_feb = BarangKeluar::whereMonth('created_at', '02')->count();
        $keluar_mar = BarangKeluar::whereMonth('created_at', '03')->count();
        $keluar_apr = BarangKeluar::whereMonth('created_at', '04')->count();
        $keluar_mei = BarangKeluar::whereMonth('created_at', '05')->count();
        $keluar_jun = BarangKeluar::whereMonth('created_at', '06')->count();
        $keluar_jul = BarangKeluar::whereMonth('created_at', '07')->count();
        $keluar_agu = BarangKeluar::whereMonth('created_at', '08')->count();
        $keluar_sep = BarangKeluar::whereMonth('created_at', '09')->count();
        $keluar_oct = BarangKeluar::whereMonth('created_at', '10')->count();
        $keluar_nov = BarangKeluar::whereMonth('created_at', '11')->count();
        $keluar_des = BarangKeluar::whereMonth('created_at', '12')->count();

        return view("layout.home.dashboard",
            ["title" => "Dashboard"],
            compact([
                "time",
                "user",
                "kategori",
                "barang",
                "barangMasuk",
                "barangKeluar",

                "masuk_jan",
                "masuk_feb",
                "masuk_mar",
                "masuk_apr",
                "masuk_mei",
                "masuk_jun",
                "masuk_jul",
                "masuk_agu",
                "masuk_sep",
                "masuk_oct",
                "masuk_nov",
                "masuk_des",

                "keluar_jan",
                "keluar_feb",
                "keluar_mar",
                "keluar_apr",
                "keluar_mei",
                "keluar_jun",
                "keluar_jul",
                "keluar_agu",
                "keluar_sep",
                "keluar_oct",
                "keluar_nov",
                "keluar_des",
            ]));

    }

}
