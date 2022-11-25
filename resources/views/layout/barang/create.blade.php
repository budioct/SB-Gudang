@extends('tamplate.theme')

@section('content')
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Data Barang</h3>
            </div>
            <div class="panel-body">
                <form action="/barang/store" method="post">
                    @csrf

                    <div class="form-group @error("kategori_id") has-error @enderror">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option value="">-- Pilih Kategori --</option>

                            @foreach($data as $init)
                                <option value="{{ $init->id }}">{{ $init->kategori }}</option>
                            @endforeach

                        </select>

                        @error("kategori_id")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group @error("namabarang") has-error @enderror">
                        <label for="email">Nama Barang</label>
                        <input type="text" id="email" name="namabarang" class="form-control" placeholder="Nama Barang"
                               value="{{old("namabarang")}}">
                        @error("namabarang")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group @error("harga") has-error @enderror">
                        <label for="password">Harga</label>
                        <input type="text" id="password" name="harga" class="form-control" placeholder="Harga"
                               value="{{old("harga")}}">
                        @error("harga")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group @error("stok") has-error @enderror">
                        <label for="password">Stok</label>
                        <input type="text" id="password" name="stok" class="form-control" placeholder="Stok"
                               value="{{old("stok")}}">
                        @error("stok")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" id="send">Save</button>
                    &nbsp;
                    <a class="btn btn-warning" href="/barang" style="color: #FFF">Back</a>
                </form>
            </div>
        </div>
    </div>

@endsection
