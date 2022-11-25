<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function login()
    {

        return view("layout.front.login", [
            "title" => "Login"
        ]);

    }

    // web
    public function prosesLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required",
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $data = ['email' => $email, 'password' => $password];

//        dd($data);

        if (Auth::attempt($data)) {
            Session::put('isLogin', true);
            Session::put('email', $email);
            return redirect("/dashboard")->with("sukses", "Anda Berhasil Login");
        } else {

            return redirect('/login')->with("error", "email atau password salah");
        }

    }

    public function proseslogout()
    {

        Auth::logout();

//        return view("layout.front.login");
        return redirect("/login")->with("sukses", "Logout");
    }


    public function index()
    {

        $data = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

//        dd($data);

        return view("layout.user.index",
            ["title" => "User"],
            compact(["data"])
        );

    }

    public function create()
    {

        return view("layout.user.create", [
            "title" => "Tambah User"
        ]);

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "email" => "required|email|unique:users",
            "name" => "required",
            "password" => "required|min:6",
        ]);

        $data = User::create([
            "name" => strtolower(request("name")),
            "email" => strtolower(request("email")),
            "role" => 2,
            "password" => bcrypt(request("password")),
        ]);

//        dd($data);

        return redirect("/user")->with("sukses", "Data Berhasil Ditambahkan");

    }

    public function edit($id)
    {

        $data = User::findOrFail(decrypt($id));

        return view("layout.user.edit",
            ["title" => "Edit User"],
            compact(["data"])
        );

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            "email" => "required|email|unique:users",
            "name" => "required",
        ]);

        $data = User::findOrFail(decrypt($id));

        if ($data) {
            $data->update([
                "name" => strtolower($request->name),
                "email" => strtolower($request->email),
                "role" => 2,
                "password" => bcrypt("rahasia"),
            ]);
        }

//        dd($data);
        return redirect("/user")->with("sukses", "Data Berhasil Diperbarui, password di reset Menjadi rahasia");

    }

    public function destroy($id)
    {

        $data = User::findOrFail(decrypt($id));

//        dd($data);

        $data->delete();

        return redirect("/user")->with("sukses", "Data Berhasil Dihapus");

    }


}
