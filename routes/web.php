<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::fallback(function () {
    return "404 Request tidak tersedia";
});

// role guest (tidak login)
Route::middleware(['guest'])->group(function () {

    Route::get('/', function () {
        return redirect('/login');
    });

    Route::get("/login", [\App\Http\Controllers\UserController::class, "login"])->name("login");
    Route::post('/requestlogin', [\App\Http\Controllers\UserController::class, "prosesLogin"]);

});

// Role admin
Route::middleware(['auth', 'checkrole:1'])->group(function () {

    Route::get("/logout", [\App\Http\Controllers\UserController::class, "proseslogout"]);

//    Route::view('/dashboard', "layout.home.dashboard", ["title" => "Dashboard"]);
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, "home"]);

    Route::get("/user", [\App\Http\Controllers\UserController::class, "index"]);
    Route::get("/user/create", [\App\Http\Controllers\UserController::class, "create"]);
    Route::post("/user/store", [\App\Http\Controllers\UserController::class, "store"]);
    Route::get("/user/{id}/edit", [\App\Http\Controllers\UserController::class, "edit"]);
    Route::put("/user/{id}", [\App\Http\Controllers\UserController::class, "update"]);
    Route::delete("/user/{id}/destroy", [\App\Http\Controllers\UserController::class, "destroy"]);

    Route::get("/kategori", [\App\Http\Controllers\KategoriController::class, "index"]);
    Route::get("/kategori/create", [\App\Http\Controllers\KategoriController::class, "create"]);
    Route::post("/kategori/store", [\App\Http\Controllers\KategoriController::class, "store"]);
    Route::get("/kategori/{id}/edit", [\App\Http\Controllers\KategoriController::class, "edit"]);
    Route::put("/kategori/{id}", [\App\Http\Controllers\KategoriController::class, "update"]);
    Route::delete("/kategori/{id}", [\App\Http\Controllers\KategoriController::class, "destroy"]);

    Route::get("/barang", [\App\Http\Controllers\BarangController::class, "index"]);
    Route::get("/barang/{id}/show", [\App\Http\Controllers\BarangController::class, "show"]);
    Route::get("/barang/create", [\App\Http\Controllers\BarangController::class, "create"]);
    Route::post("/barang/store", [\App\Http\Controllers\BarangController::class, "store"]);
    Route::get("/barang/{id}/edit", [\App\Http\Controllers\BarangController::class, "edit"]);
    Route::put("/barang/{id}", [\App\Http\Controllers\BarangController::class, "update"]);
    Route::delete("/barang/{id}", [\App\Http\Controllers\BarangController::class, "destroy"]);

    // proses
    Route::get("/proses/{id}/index", [\App\Http\Controllers\ProsesController::class, "index"]);
    Route::post("/proses/barangmasuk/store", [\App\Http\Controllers\ProsesController::class, "store"]);
    Route::post("/proses/barangkeluar/delete", [\App\Http\Controllers\ProsesController::class, "delete"]);

    // laporan
    Route::get("/laporan/{id}/barangmasuk", [\App\Http\Controllers\ProsesController::class]);
    Route::get("/laporan/{id}/barangmasuk/cetak", [\App\Http\Controllers\ProsesController::class, "cetakbarangmasuk"]);

    Route::get("/laporan/{id}/barangkeluar", [\App\Http\Controllers\ProsesController::class]);
    Route::get("/laporan/{id}/barangkeluar/cetak", [\App\Http\Controllers\ProsesController::class, "cetakbarangkeluar"]);

});

// Role Warehouse
Route::middleware(['auth', 'checkrole:1,2'])->group(function () {

    Route::get("/logout", [\App\Http\Controllers\UserController::class, "proseslogout"]);

//    Route::view('/dashboard', "layout.home.dashboard", ["title" => "Dashboard"]);
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, "home"]);

    Route::get("/kategori", [\App\Http\Controllers\KategoriController::class, "index"]);
    Route::get("/kategori/create", [\App\Http\Controllers\KategoriController::class, "create"]);
    Route::post("/kategori/store", [\App\Http\Controllers\KategoriController::class, "store"]);
    Route::get("/kategori/{id}/edit", [\App\Http\Controllers\KategoriController::class, "edit"]);
    Route::put("/kategori/{id}", [\App\Http\Controllers\KategoriController::class, "update"]);
    Route::delete("/kategori/{id}", [\App\Http\Controllers\KategoriController::class, "destroy"]);

    Route::get("/barang", [\App\Http\Controllers\BarangController::class, "index"]);
    Route::get("/barang/{id}/show", [\App\Http\Controllers\BarangController::class, "show"]);
    Route::get("/barang/create", [\App\Http\Controllers\BarangController::class, "create"]);
    Route::post("/barang/store", [\App\Http\Controllers\BarangController::class, "store"]);
    Route::get("/barang/{id}/edit", [\App\Http\Controllers\BarangController::class, "edit"]);
    Route::put("/barang/{id}", [\App\Http\Controllers\BarangController::class, "update"]);
    Route::delete("/barang/{id}", [\App\Http\Controllers\BarangController::class, "destroy"]);

    // proses
    Route::get("/proses/{id}/index", [\App\Http\Controllers\ProsesController::class, "index"]);
    Route::post("/proses/barangmasuk/store", [\App\Http\Controllers\ProsesController::class, "store"]);
    Route::post("/proses/barangkeluar/delete", [\App\Http\Controllers\ProsesController::class, "delete"]);

    // laporan
    Route::get("/laporan/{id}/barangmasuk", [\App\Http\Controllers\ProsesController::class]);
    Route::get("/laporan/{id}/barangmasuk/cetak", [\App\Http\Controllers\ProsesController::class, "cetakbarangmasuk"]);

    Route::get("/laporan/{id}/barangkeluar", [\App\Http\Controllers\ProsesController::class]);
    Route::get("/laporan/{id}/barangkeluar/cetak", [\App\Http\Controllers\ProsesController::class, "cetakbarangkeluar"]);

});



