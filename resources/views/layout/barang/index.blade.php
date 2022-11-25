@extends('tamplate.theme')

@section('content')

    {{--    {{ $barang }}--}}

    @if( session("sukses"))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> {{ session("sukses") }}
        </div>
    @endif

    <div class="panel panel-headline">
        <div class="panel-body">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Barang</h3>
                    </div>

                    <div class="panel-body">
                        <a href="/barang/create">
                            <button type="button" class="btn btn-success">&nbsp; Tambah Data</button>
                        </a>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                            <tr>
                                <th width="50" style="text-align:center;">No</th>
                                <th width="300" style="text-align:center;">Nama</th>
                                <th width="250" style="text-align:center;">Kategori</th>
                                <th width="150" style="text-align:center;">Harga</th>
                                <th width="100" style="text-align:center;">Stock</th>
                                <th width="300" style="text-align:center;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($barang as $index => $init)
                                <tr>
                                    <td>{{$index + $barang->firstItem()}}</td>
                                    <td>{{$init->namabarang}}</td>
                                    <td>{{$init->kategori->kategori}}</td>
                                    <td>Rp. {{ number_format($init->harga) }}</td>
                                    <td>{{$init->stok}} Unit</td>
                                    <td>
                                        <form method="post" action="/barang/{{ encrypt($init->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="ui buttons">
                                                {{--                                                /barangmasuk/{id}/index--}}
                                                <a href="/proses/{{ encrypt($init->id) }}/index">
                                                    {{--                                                <a href="/barangmasuk/index">--}}
                                                    <button type="button" class="btn btn-primary" title="Proses"><i
                                                            class="lnr lnr-eye"></i>&nbsp;
                                                    </button>
                                                </a>
                                                &nbsp;
                                                <a href="/barang/{{ encrypt($init->id) }}/edit">
                                                    <button type="button" class="btn btn-warning" title="Edit"><i
                                                            class="lnr lnr-pencil"></i>&nbsp;
                                                    </button>
                                                </a>
                                                &nbsp;
                                                <a>
                                                    <button type="submit" class="btn btn-danger" title="Delete"><i
                                                            class="fa fa-trash">&nbsp; </i>
                                                    </button>
                                                </a>
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
                        Total Data Barang: <span class="label label-info"><b> {{ $barang->total() }} </b></span>
                        {{ $barang->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
