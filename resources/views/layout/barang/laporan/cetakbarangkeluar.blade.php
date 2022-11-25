<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
            {{$title}}
        @endif
    </title>

    <link rel="stylesheet" type="text/css" href="{{asset('/tamplate/assets/dist/semantic.min.css')}}"/>

    {{--    --}}

    <style type="text/css" onload="window.print()">
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000000;
        }

    </style>
</head>

<body style="background-color: white;">


<!-- content -->
<div class="pusher">
    <div class="main-content">
        {{--        {{ $data }}--}}

        <div class="ui segment">
            <div class="ui raised segment">

                <table class="ui celled table">
                    <tr>
                        <td align="center">
                                <span style="line-height: 1.7; font-weight: bold;">
                                    Warehouse
                                    <br>PT. Sumber Barokah
                                    <br>Jl. Inpres V No.84, Larangan Utara, Kec. Larangan,
                                    <br>Kota Tangerang, Banten, kode pos: 15154
                                </span>
                        </td>
                        <td style="text-align:center;">
                            <img width="115" height="97" src="{{ asset('/tamplate/assets/img/logo-new.png') }}">
                        </td>
                    </tr>
                </table>

                <hr class="line">
                <h3>
                    <p align="center">
                        Laporan Keluar Barang
                    </p>
                </h3>
                <h3>
                    <p align="center">
                        Hari/Tanggal: <b> {{ $data->created_at->translatedFormat('l, d F Y') }} </b>
                    </p>
                </h3>

                <table class="ui fixed celled table">
                    <thead>
                    <tr>
                        <th style="text-align:center;">Nama Barang</th>
                        <th style="text-align:center;">Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align:center;" data-label="Name">{{ $data->barang->namabarang }}</td>
                        <td style="text-align:center;" data-label="Age">{{ $data->jml_brg_keluar }} Unit</td>
                    </tr>
                    </tbody>
                </table>

                <hr class="line">

                <table class="ui  celled structured table" >

                    <tbody>
                    <tr>
                        <td style="text-align:center;">Diserahkan Oleh</td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td style="text-align:center;">Diterima Oleh</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;"></td>
                        <td class="right aligned"></td>
                        <td class="right aligned"></td>
                        <td class="center aligned"></td>
                        <td style="text-align:center;"></td>
                    </tr>
                    <tr>
                        <td class="right aligned"></td>
                        <td class="right aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>

                    </tr>
                    <tr>
                        <td class="right aligned"></td>
                        <td class="right aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                    </tr>
                    <tr>
                        <td class="center aligned">( <b>{{ auth()->user()->name }}</b> )</td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned"></td>
                        <td class="center aligned">( <b>TTD</b> )</td>
                    </tr>
                    </tbody>


                </table>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('/tamplate/assets/dist/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('/tamplate/assets/dist/semantic.min.js')}}"></script>
<script src="{{asset('/tamplate/assets/dist/script.js')}}"></script>

</body>
</html>

