@extends('tamplate.theme')

@section('content')

    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Ubah Data Kategori</h3>
            </div>
            <div class="panel-body">
                <form action="/kategori/{{ encrypt($data->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="form-group @error("kategori") has-error @enderror">
                        <label for="lname">Name</label>
                        <input type="text" id="lname" name="kategori" class="form-control" placeholder="Name"
                               value="{{$data->kategori}}">
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
