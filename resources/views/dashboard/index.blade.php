@extends('layouts.dashboard-layout')

@section('title', 'Beranda - PT. Kartika Prima Abadi')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6 mt-1">
                <h4 class="m-0">
                    <b>
                        Beranda
                    </b>
                </h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <b>
                                Dashboard
                            </b>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-solid fa-users"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Divisi</span>
                        <span class="info-box-number">
                            {{ $divisi }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-solid fa-user"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengguna</span>
                        <span class="info-box-number">{{ $login }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-solid fa-folder-open"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Laporan</span>
                        <span class="info-box-number">{{ $laporan }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-solid fa-comments"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Informasi</span>
                        <span class="info-box-number">25</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="text-center">
                                    <b>
                                        Presentase Laporan Bulanan Divisi {{ $users->divisi->divisi_nama }} - Tahun
                                        {{ $year }}
                                    </b>
                                </h5>
                                <hr />
                                <canvas id="monthlyPerformanceChart" width="200" height="50"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var reportCounts = {!! json_encode($reportCounts) !!}; // Jumlah laporan per bulan
            // var months = {!! json_encode($months) !!}; // Label bulan

            var ctx = document.getElementById('monthlyPerformanceChart').getContext('2d');
            var monthlyPerformanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // labels: months, // Gunakan label bulan
                    datasets: [{
                        label: 'Jumlah Laporan',
                        data: reportCounts, // Jumlah laporan per bulan
                        backgroundColor: 'rgba(54, 162, 235, 0.8)', // Warna batang
                        borderColor: 'rgba(54, 162, 235, 1)', // Warna border
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
        });
    </script>
@endpush
