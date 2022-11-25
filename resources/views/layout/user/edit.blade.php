@extends('tamplate.theme')

@section('content')

    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Ubah Data User</h3>
            </div>
            <div class="panel-body">
                <form action="/user/{{ encrypt($data->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="form-group @error("name") has-error @enderror">
                        <label for="lname">Name</label>
                        <input type="text" id="lname" name="name" class="form-control" placeholder="Name"
                               value="{{$data->name}}">
                        @error("name")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group @error("email") has-error @enderror">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                               value="{{$data->email}}">
                        @error("email")
                        <div class="invalid-feedback has-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" id="send">Save</button>
                    &nbsp;
                    <a class="btn btn-warning" href="/user" style="color: #FFF">Back</a>
                </form>
            </div>
        </div>
    </div>

@endsection
