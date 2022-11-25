<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function index()
    {

        $data = DB::table('kategoris')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view("layout.kategori.index",
            ["title" => "Kategori"],
            compact(["data"])
        );

    }

    public function create()
    {

        return view("layout.kategori.create", [
            "title" => "Tambah Kategori"
        ]);

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "kategori" => "required|unique:kategoris",
        ]);

        $data = Kategori::create([
            "kategori" => strtoupper(request("kategori")),
        ]);

//        dd($data);

        return redirect("/kategori")->with("sukses", "Data Berhasil Ditambahkan");

    }

    public function edit($id)
    {

        $data = Kategori::findOrFail(decrypt($id));

        return view("layout.kategori.edit",
            ["title" => "Edit Kategori"],
            compact(["data"])
        );

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            "kategori" => "required|unique:kategoris",
        ]);

        $data = Kategori::findOrFind(decrypt($id));

        if ($data) {
            $data->update([
                "kategori" => strtoupper($request->kategori),
            ]);
        }

        return redirect("/kategori")->with("sukses", "Data Berhasil Diperbarui");

    }

    public function destroy($id)
    {

        $data = Kategori::findOrFail(decrypt($id));

        $data->delete();

        return redirect("/kategori")->with("sukses", "Data Berhasil Dihapus");

    }


}
