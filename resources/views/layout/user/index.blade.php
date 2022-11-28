@extends('tamplate.theme')

@section('content')



    @if( session("sukses"))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> {{ session("sukses") }}
        </div>
    @endif

    <div class="panel panel-headline">
        <div class="panel-body">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">User</h3>
                    </div>

                    <div class="panel-body">
                    <a href="/user/create"><button type="button" class="btn btn-success">&nbsp; Tambah Data </button></a>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                            <tr>
                                <th width="70" style="text-align:center;">No</th>
                                <th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Role</th>
                                <th width="300" style="text-align:center;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $index => $init)
                            <tr>
                                <td>{{$index + $data->firstItem()}}</td>
                                <td>{{$init->name}}</td>
                                <td>{{$init->email}}</td>
                                @if($init->role == 1)
                                <td>Admin</td>
                                @else
                                <td>Warehouse</td>
                                @endif
                                <td>
                                    <form method="post" action="/user/{{ encrypt($init->id) }}/destroy">
                                        @csrf
                                        @method('delete')
                                        <div class="ui buttons">
                                            <a href="/user/{{ encrypt($init->id) }}/edit"><button type="button" class="btn btn-warning" title="Edit"><i class="lnr lnr-pencil"></i>&nbsp; Edit</button></a>
                                            &nbsp;
                                            <a><button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash">&nbsp; Hapus</i></button></a>
{{--                                            <input class="btn btn-danger fa fa-trash" data-id="{{$init->id}}" type="submit"--}}
{{--                                                   name="submit"--}}
{{--                                                   value="Hapus">--}}
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        Total Data User: <span class="label label-info"><b> {{ $data->total() }} </b></span>
                        {{ $data->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
