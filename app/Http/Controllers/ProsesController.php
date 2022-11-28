<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProsesController extends Controller
{

    public function index($id)
    {

        // select byId
        $barang = Barang::findOrFail(decrypt($id)); // result {}
        $id = $barang->id;

        // not support paginate
//        $barangmasuk = BarangMasuk::with(['barang', 'user'])
//            ->orderBy('created_at', 'desc')
//            ->get(); // result [{}]
//        $barangmasuk = $barangmasuk[0]; // result {}

        // not support paginate
//        $barangkeluar = BarangKeluar::with(['barang', 'user'])
//            ->orderBy('created_at', 'desc')
//            ->get(); // result [{}]

        $barangmasuk = BarangMasuk::leftjoin("users", "users.id", "=", "barang_masuks.user_id")
            ->leftjoin('barangs', 'barangs.id', '=', 'barang_masuks.barang_id')
            ->select("barang_masuks.*")
            ->where('barang_masuks.barang_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $barangkeluar = BarangKeluar::leftjoin("users", "users.id", "=", "barang_keluars.user_id")
            ->leftjoin('barangs', 'barangs.id', '=', 'barang_keluars.barang_id')
            ->select("barang_keluars.*")
            ->where('barang_keluars.barang_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view("layout.barang.show",
            ["title" => "Proses"],
            compact(["barang", "barangmasuk", "barangkeluar",]
            ));

    }

    public function store(Request $request)
    {

        $barang = Barang::findOrFail($request->barang_id); // result {}

        if ($request->jml_brg_masuk == 0) {
            return redirect("/proses/" . encrypt($barang->id) . "/index")->with("fail", "Jumlah In tidak boleh 0");
        } else {

            $data = BarangMasuk::create([
                "barang_id" => $request->barang_id,
                "user_id" => $request->user_id,
                "jml_brg_masuk" => $request->jml_brg_masuk,
                "total" => $request->total,
            ]);

            $barang->stok += $request->jml_brg_masuk;
            $barang->save();

            return redirect("/proses/" . encrypt($barang->id) . "/index")->with("sukses", "Data Barang In Berhasil Disimpan");
        }

    }

    public function delete(Request $request)
    {

        $barang = Barang::findOrFail($request->barang_id); // {}

        if ($barang->stok < $request->jml_brg_keluar) {
            return redirect("/proses/" . encrypt($barang->id) . "/index")->with("fail", "Jumlah Out tidak boleh lebih dari stok yang tersedia");
        } else {

            $data = BarangKeluar::create([
                "barang_id" => $request->barang_id,
                "user_id" => $request->user_id,
                "jml_brg_keluar" => $request->jml_brg_keluar,
                "total" => $request->total,
            ]);

            $barang->stok -= $request->jml_brg_keluar;
            $barang->save();
            return redirect("/proses/" . encrypt($barang->id) . "/index")->with("sukses", "Data Barang Out Berhasil Disimpan");
        }

    }

    public function cetakbarangmasuk($id)
    {

        $data = BarangMasuk::findOrFail(decrypt($id));

//        dd($data);

        return view("layout.barang.laporan.cetakbarangmasuk",
            ["title" => "Print"],
            compact(["data"]
            ));

    }

    public function cetakbarangkeluar($id)
    {

        $data = BarangKeluar::findOrFail(decrypt($id));

//        dd($data);

        return view("layout.barang.laporan.cetakbarangkeluar",
            ["title" => "cetak barang keluar"],
            compact(["data"]
            ));

    }


}
