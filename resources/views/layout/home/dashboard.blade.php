@extends('tamplate.theme')

@section('content')

    <div class="panel panel-headline">
        <div class="panel-heading">
            @if( session("sukses"))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i> {{ session("sukses") }}
                </div>
            @endif
            <h3 class="panel-title">Dashboard</h3>
            {{--                <p class="panel-subtitle"> </p>--}}
            <h3 class="panel-title">{{ $time }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <!-- content -->
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="metric">
                        <span class="icon"><i class="lnr lnr-user"></i></span>
                        <p>
                            <span class="number"><b>{{ $user }}</b></span>
                            <span class="title">User</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="metric">
                        <span class="icon"><i class="lnr lnr-layers"></i></span>
                        <p>
                            <span class="number"><b>{{ $kategori }}</b></span>
                            <span class="title">Kategori</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="metric">
                        <span class="icon"><i class="lnr lnr-briefcase"></i></span>
                        <p>
                            <span class="number"><b>{{ $barang }}</b></span>
                            <span class="title">Barang</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cart -->
            <div class="row">
                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="lnr lnr-pie-chart"></i></span>
                        <p>
                            <span class="number"><b>Seluruh Jumlah Barang Masuk & Keluar </b></span>
                            <span class="title">Doughnut Chart</span>
                        </p>
                            <br>
                            <br>
                        <div class="panel-body">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="lnr lnr-chart-bars"></i></span>
                        <p>
                            <span class="number"><b>Jumlah Barang Masuk & Keluar Perbulan</b></span>
                            <span class="title">Bar Chart</span>
                        </p>
                        <br>
                        <br>
                        <div class="panel-body">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('doughnutChart');
        const doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Barang Masuk', 'Barang Keluar', ],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $barangMasuk }}, {{ $barangKeluar }}],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctr = document.getElementById('barChart');
        const barChart = new Chart(ctr, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Barang Masuk',
                    data: [
                        {{ $masuk_jan }},
                        {{ $masuk_feb }},
                        {{ $masuk_mar }},
                        {{ $masuk_apr }},
                        {{ $masuk_mei }},
                        {{ $masuk_jun }},
                        {{ $masuk_jul }},
                        {{ $masuk_agu }},
                        {{ $masuk_sep }},
                        {{ $masuk_oct }},
                        {{ $masuk_nov }},
                        {{ $masuk_des }},
                    ],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.2)',
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Barang Keluar',
                        data: [
                            {{ $keluar_jan }},
                            {{ $keluar_feb }},
                            {{ $keluar_mar }},
                            {{ $keluar_apr }},
                            {{ $keluar_mei }},
                            {{ $keluar_jun }},
                            {{ $keluar_jul }},
                            {{ $keluar_agu }},
                            {{ $keluar_sep }},
                            {{ $keluar_oct }},
                            {{ $keluar_nov }},
                            {{ $keluar_des }},
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
