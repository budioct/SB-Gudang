@extends('tamplate.theme')

@section('content')
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Data Kategori</h3>
            </div>
            <div class="panel-body">
                <form action="/kategori/store" method="post">
                    @csrf

                    <div class="form-group @error("kategori") has-error @enderror">
                        <label for="lname">Kategori Barang</label>
                        <input type="text" id="lname" name="kategori" class="form-control" placeholder="Kategori Barang" value="{{old("kategori")}}">
                        @error("kategori")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" id="send">Save</button>
                    &nbsp;
                    <a class="btn btn-warning" href="/kategori" style="color: #FFF">Back</a>
                </form>
            </div>
        </div>
    </div>

@endsection
