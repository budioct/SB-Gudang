@extends('tamplate.theme')

@section('content')

    <div class="container-fluid">
        <a href="/barang">
            <button type="button" class="btn btn-warning">
                <i class="lnr lnr-chevron-left"></i>&nbsp; Back
            </button>
        </a>
        <br>
        <br>
        <h3 class="page-title">Proses</h3>
        <div class="row">

            <div class="col-md-8">

                @if( $barang->stok == 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-warning"></i> &nbsp; &nbsp; Stok <b>{{ $barang->namabarang }} <span
                                style="color: #0c1312">0</span> Unit</b>
                    </div>
                @endif

                @if( session("fail"))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-warning"></i> {{ session("fail") }}
                    </div>
                @endif


                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Detail Barang</b></h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $barang->namabarang }}</td>
                                    <td>{{ $barang->kategori->kategori }}</td>
                                    <td>Rp. {{ number_format($barang->harga) }}</td>
                                    @if( $barang->stok == 0)
                                        <td><span class="label label-danger"><b>{{ $barang->stok }} Unit</b></span></td>
                                    @else
                                        <td>{{ $barang->stok }} Unit</td>
                                    @endif
                                    <td>
                                        <!-- Button trigger modal -->

                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modalIn">
                                            <i class="lnr lnr-enter-down"></i> &nbsp;
                                            In
                                        </button>


                                        @if($barang->stok != 0)
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalOut">
                                                <i class="lnr lnr-exit-up"></i> &nbsp;
                                                Out
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <hr>

        @if( session("sukses"))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <i class="fa fa-check-circle"></i> {{ session("sukses") }}
            </div>
        @endif

        <div class="row">

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Barang Masuk</b>&nbsp;<span class="label label-success"><i class="lnr lnr-enter-down"></i></span></h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    {{--                                    <th>Nama</th>--}}
                                    <th>User Mengetahui</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal & waktu</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($barangmasuk as $index => $init)
                                    <tr>
                                        <td>{{ $index + $barangmasuk->firstItem() }}</td>
                                        {{--                                        <td>{{ $init->barang->namabarang }}</td>--}}
                                        <td>{{ $init->user->name }}</td>

                                        <td><span class="label label-info"><b>{{ $init->jml_brg_masuk }} Unit</b></span>
                                        </td>
                                        <td><b>{{ $init->created_at->translatedFormat('l, d F Y H:i') }}</b></td>
                                        <td>

                                            <a href="/laporan/{{encrypt($init->id)}}/barangmasuk/cetak" target="_blank">
                                                <button type="button" class="btn btn-primary" title="Preview"><i
                                                        class="lnr lnr-printer"></i>&nbsp;
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->
                            Total Data Barang Masuk: <span class="label label-info"><b> {{ $barangmasuk->total() }} </b></span>
                            {{ $barangmasuk->links() }}
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Barang Keluar</b>&nbsp;<span class="label label-danger"><i class="lnr lnr-exit-up"></i></span></h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    {{--                                    <th>Nama</th>--}}
                                    <th>User Mengetahui</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal & waktu</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($barangkeluar as $index => $init)
                                    <tr>
                                        <td>{{ $index + $barangkeluar->firstItem() }}</td>
                                        {{--                                        <td>{{ $init->barang->namabarang }}</td>--}}
                                        <td>{{ $init->user->name }}</td>

                                        <td><span
                                                class="label label-info"><b>{{ $init->jml_brg_keluar }} Unit</b></span>
                                        </td>
                                        <td><b>{{ $init->created_at->translatedFormat('l, d F Y H:i') }}</b></td>
                                        <td>

                                            <a href="/laporan/{{encrypt($init->id)}}/barangkeluar/cetak"
                                               target="_blank">
                                                <button type="button" class="btn btn-primary" title="Preview"><i
                                                        class="lnr lnr-printer"></i>&nbsp;
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->
                            Total Data Barang Keluar: <span
                                class="label label-info"><b> {{ $barangkeluar->total() }} </b></span>
                            {{ $barangkeluar->links() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Modal In -->
    <div class="modal fade" id="modalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Barang Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/proses/barangmasuk/store" method="post">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" class="form-control" name="barang_id" value="{{ $barang->id }}" readonly>

                        <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}"
                               readonly>

                        <input type="hidden" id="harga_asek" class="form-control" value="{{ $barang->harga }}" readonly>

                        <!-- div ajax-->
                        <div id="detail_barang"></div>

                        <div class="form-group @error("jml_brg_masuk") has-error @enderror">
                            <label for="lbrgmasuk">Jumlah Barang IN</label>
                            <input type="number" id="jml_brg_masuk" name="jml_brg_masuk" class="form-control"
                                   placeholder="Barang in" value="{{ old("jml_brg_masuk") }}" required min="0">
                            @error("jml_brg_masuk")
                            <div class="invalid-feedback has-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group @error("peminjam") has-error @enderror">
                            <label>Peminjam</label>
                            <select class="form-control" name="peminjam" required>
                                <option value="">-- Pilih Peminjam --</option>
                                @foreach($peminjam as $init)
                                    @if( $init->name != auth()->user()->name)
                                        <option value="{{ $init->id }}">{{ $init->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error("peminjam")
                            <div class="invalid-feedback alert-danger alert-dismissible">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="ltotal">Total Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon"><b>Rp.</b></span>
                            <input type="text" id="total" name="total" class="form-control"
                                   placeholder="total" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="send">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Out -->
    <div class="modal fade" id="modalOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Barang Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/proses/barangkeluar/delete" method="post">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" class="form-control" name="barang_id" value="{{ $barang->id }}" readonly>

                        <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}"
                               readonly>

                        <input type="hidden" id="harga_asek" class="form-control" value="{{ $barang->harga }}" readonly>

                        <div class="form-group @error("jml_brg_keluar") has-error @enderror">
                            <label for="lname">Jumlah Barang OUT</label>
                            <input type="number" id="jml_brg_keluar" name="jml_brg_keluar" class="form-control"
                                   placeholder="Barang Out" value="{{old("jml_brg_keluar")}}" required min="0">
                            @error("kategori")
                            <div class="invalid-feedback has-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group @error("peminjam") has-error @enderror">
                            <label>Peminjam</label>
                            <select class="form-control" name="peminjam" required>
                                <option value="">-- Pilih Peminjam --</option>
                                @foreach($peminjam as $init)
                                    @if( $init->name != auth()->user()->name)
                                        <option value="{{ $init->id }}">{{ $init->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error("peminjam")
                            <div class="invalid-feedback alert-danger alert-dismissible">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <label for="ltotal">Total Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon"><b>Rp.</b></span>
                            <input type="text" id="total1" name="total" class="form-control"
                                   placeholder="total" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="send">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/tamplate/assets/vendor/jquery/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#jml_brg_masuk").keyup(function () {
                var jml_brg_masuk = $("#jml_brg_masuk").val();
                var harga_asek = $("#harga_asek").val();

                var total = parseInt(harga_asek) * parseInt(jml_brg_masuk);
                $("#total").val(total);

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#jml_brg_keluar").keyup(function () {
                var jml_brg_keluar = $("#jml_brg_keluar").val();
                var harga_asek = $("#harga_asek").val();

                var total1 = parseInt(harga_asek) * parseInt(jml_brg_keluar);
                $("#total1").val(total1);

            });
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@endsection
