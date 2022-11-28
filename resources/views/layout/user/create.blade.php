@extends('tamplate.theme')

@section('content')
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Data User</h3>
            </div>
            <div class="panel-body">
                <form action="/user/store" method="post">
                    @csrf

                    <div class="form-group @error("name") has-error @enderror">
                        <label for="lname">Name</label>
                        <input type="text" id="lname" name="name" class="form-control" placeholder="Name" value="{{old("name")}}">
                        @error("name")
                        <div class="invalid-feedback alert-danger alert-dismissible">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group @error("email") has-error @enderror">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                               value="{{old("email")}}">
                        @error("email")
                        <div class="invalid-feedback alert-danger alert-dismissible">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group @error("password") has-error @enderror">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Password"
                               value="{{old("password")}}">
                        @error("password")
                        <div class="invalid-feedback alert-danger alert-dismissible">
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
