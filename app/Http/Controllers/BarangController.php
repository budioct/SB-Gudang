<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    public function index()
    {

        $barang = Barang::with('kategori')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view("layout.barang.index",
            ["title" => "Barang"],
            compact(["barang"])
        );

    }

    public function show($id)
    {

        // select byId
        $data = Barang::find(decrypt($id)); // result {}

//        $barangmasuk = BarangMasuk::with(['barang', 'user'])
//            ->orderBy('created_at', 'desc')
//            ->get();
//
//        $barangmasuk = $barangmasuk[0];

//        $barang = Barang::where("id", $id)->get(); // result [{}]
//        $barang = $barang[0]; // result {}

        return view("layout.barang.show",
            ["title" => "detail Barang"],
            compact(["data"])
        );
    }

    public function create()
    {

        $data = Kategori::all();

        return view("layout.barang.create",
            ["title" => "Tambah Barang"],
            compact(["data"])
        );

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "kategori_id" => "required",
            "namabarang" => "required|unique:barangs",
            "harga" => 'required|numeric|min:0|not_in:0',
            "stok" => 'required|numeric|min:0|not_in:0',
        ]);

        $data = Barang::create([
            "namabarang" => request("namabarang"),
            "kategori_id" => request("kategori_id"),
            "harga" => request("harga"),
            "stok" => request("stok"),
        ]);

//        dd($data);
        return redirect("/barang")->with("sukses", "Data Berhasil Ditambahkan");

    }

    public function edit($id)
    {

        $data = Barang::findOrFail(decrypt($id));
        $kategori = Kategori::all();


        return view("layout.barang.edit",
            ["title" => "Edit Barang"],
            compact(["data", "kategori"])
        );

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            "kategori_id" => "required",
            "namabarang" => "required|unique:barangs",
            "harga" => 'required|numeric|min:0|not_in:0',
            "stok" => 'required|numeric|min:0|not_in:0',
        ]);

        $data = Barang::findOrFail(decrypt($id));

        if ($data) {
            $data->update([
                "kategori_id" => $request->kategori_id,
                "namabarang" => $request->namabarang,
                "harga" => $request->harga,
                "stok" => $request->stok,
            ]);
        }

        return redirect("/barang")->with("sukses", "Data Berhasil DiUbah");

    }

    public function destroy($id)
    {

        $barang = Barang::findOrFail(decrypt($id));

        $barang->delete();

        return redirect("/barang")->with("sukses", "Data Berhasil DiHapus");

    }


}
