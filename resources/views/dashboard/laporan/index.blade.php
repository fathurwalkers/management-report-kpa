@extends('layouts.dashboard-layout')

@section('title', '{$divisi} - PT. Kartika Prima Abadi')

@push('css')
    <link href="{{ asset('assets/datatables') }}/datatables.min.css" rel="stylesheet">
    <style>
        .checkbox-table {
            width: 100%;
            border-collapse: collapse;
        }

        .checkbox-table td {
            width: 10%;
            text-align: center;
            padding: 1px;
            padding-right: 1px
        }

        .styled-checkbox {
            display: none;
        }

        .styled-checkbox+label {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 2px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .styled-checkbox:checked+label {
            background-color: black;
            border-color: white;
            color: white;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content-header')
    {{-- <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan - {{ $divisi_nama }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid --> --}}
@endsection

@section('main-content')

    @php
        $isHRD = $users->divisi_id == 2;
        $divisi_page = $divisi->id;
        // dd($divisi);
    @endphp
    @if (($isHRD && $divisi_page == 2) || $users->login_level == 'pj')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="text-center">
                                    <b>
                                        Presentase Laporan Bulanan Divisi {{ $divisi->divisi_nama }} - Periode
                                        {{ $periode_sekarang }} Tahun {{ $year }}
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
        @if ($users->divisi_id == $divisi_page)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-6">
                                <h4>
                                    <b>
                                        Input Data Laporan
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button class="btn btn-sm btn-info">
                                    Dashboard /
                                    <b>
                                        Laporan
                                    </b>
                                </button>
                            </div><!-- /.col -->
                        </div>
                        <hr />
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="alert alert-info">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div id="success-message" style="display:none;" class="alert alert-success mt-3"></div>

                        <form id="laporan-form" action="{{ route('proses-laporan') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                        <textarea id="laporan_rencana_kerja" cols="1" rows="4" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja">
                                        {{-- <input type="text" class="form-control" id="laporan_rencana_kerja"
                                            name="laporan_rencana_kerja" > --}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="laporan_keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="laporan_keterangan"
                                            name="laporan_keterangan" >
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                        <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                            name="laporan_presentasi_pencapaian" >
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="created_at">Tgl/Waktu Kegiatan</label>
                                        <input type="date" class="form-control" id="created_at" name="created_at"
                                            >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label for="">Pilih Tanggal Kerja</label>

                                    <table class="checkbox-table">
                                        <tbody>
                                            @for ($i = 1; $i <= $jumlah_hari; $i++)
                                                @if ($i % 10 == 1)
                                                    <tr>
                                                @endif
                                                <td>
                                                    <input type="checkbox" id="day{{ $i }}"
                                                        class="styled-checkbox" name="laporan_jumlah_hari[]"
                                                        value="{{ $i }}">
                                                    <label for="day{{ $i }}">
                                                        {{ $i }}
                                                    </label>
                                                </td>
                                                @if ($i % 10 == 0 || $i == $jumlah_hari)
                                                    </tr>
                                                @endif
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="">
                                        Upload Data
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        @else
        @endif
    @elseif(!$isHRD && $users->divisi_id == $divisi_page)
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <h4>
                                <b>
                                    Input Data Laporan
                                </b>
                            </h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <button class="btn btn-sm btn-info">
                                Dashboard /
                                <b>
                                    Laporan
                                </b>
                            </button>
                        </div><!-- /.col -->
                    </div>
                    <hr />
                    @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="alert alert-info">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div id="success-message" style="display:none;" class="alert alert-success mt-3"></div>

                    <form id="laporan-form" action="{{ route('proses-laporan') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                    {{-- <textarea id="laporan_rencana_kerja" cols="1" rows="4" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja"> --}}
                                    <input type="text" class="form-control" id="laporan_rencana_kerja"
                                        name="laporan_rencana_kerja" >
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="laporan_keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="laporan_keterangan"
                                        name="laporan_keterangan">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                    <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                        name="laporan_presentasi_pencapaian" >
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="created_at">Tgl/Waktu Kegiatan</label>
                                    <input type="date" class="form-control" id="created_at" name="created_at"
                                        >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="">Pilih Tanggal Kerja</label>

                                <table class="checkbox-table">
                                    <tbody>
                                        @for ($i = 1; $i <= $jumlah_hari; $i++)
                                            @if ($i % 10 == 1)
                                                <tr>
                                            @endif
                                            <td>
                                                <input type="checkbox" id="day{{ $i }}"
                                                    class="styled-checkbox" name="laporan_jumlah_hari[]"
                                                    value="{{ $i }}">
                                                <label for="day{{ $i }}">
                                                    {{ $i }}
                                                </label>
                                            </td>
                                            @if ($i % 10 == 0 || $i == $jumlah_hari)
                                                </tr>
                                            @endif
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="">
                                    Upload Data
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h4>
                            <b>
                                Laporan
                            </b>
                        </h4>
                    </div>

                    <div class="col-sm-5 col-md-5 col-lg-5 d-flex justify-content-end">
                        <label for="filter-bulan">Filter Periode : </label>
                        <select id="filter-bulan" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="2024-01">Januari</option>
                            <option value="2024-02">Februari</option>
                            <option value="2024-03">Maret</option>
                            <option value="2024-04">April</option>
                            <option value="2024-05">Mei</option>
                            <option value="2024-06">Juni</option>
                            <option value="2024-07">Juli</option>
                            <option value="2024-08">Agustus</option>
                            <option value="2024-09">September</option>
                            <option value="2024-10">Oktober</option>
                            <option value="2024-11">November</option>
                            <option value="2024-12">Desember</option>
                        </select>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 d-flex justify-content-end">
                        <h4>
                            <b>
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Print Laporan untuk Bulan
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Menggunakan loop untuk bulan dari 1 hingga 12 -->
                                    @foreach (range(1, 12) as $bulan)
                                        <form action="{{ route('print-laporan') }}" method="POST" class="m-0">
                                            @csrf
                                            <input type="hidden" name="divisi_nama" value="{{ $divisi_nama }}">
                                            <input type="hidden" name="bulan" value="{{ $bulan }}">
                                            <button type="submit" class="dropdown-item">
                                                {{ date('F', mktime(0, 0, 0, $bulan, 1)) }} (Bulan {{ $bulan }})
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </b>
                        </h4>
                    </div>

                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Divisi</th>
                                    <th>Nama Penginput</th>
                                    <th>Rencana Kerja</th>
                                    <th>Presentasi Pencapaian</th>
                                    <th>Keterangan</th>
                                    <th>Tgl. Input</th>
                                    @if ($users->divisi_id !== 26)
                                        <th>Status</th>
                                    @endif
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($laporan as $lp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $lp->divisi->divisi_nama }}</td>
                                        <td>{{ $lp->login->login_nama }}</td>
                                        <td>{{ $lp->laporan_rencana_kerja }}</td>
                                        <td class="text-center">{{ $lp->laporan_presentasi_pencapaian }}</td>
                                        <td class="text-center">{{ $lp->laporan_keterangan }}</td>
                                        <td>{{ $lp->created_at }}</td>
                                        @if ($users->divisi_id !== 26)
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto btn-group">
                                                        @switch($lp->laporan_status)
                                                            @case('PENDING')
                                                                <button type="button" class="btn btn-sm btn-warning mr-1">
                                                                    PENDING
                                                                </button>
                                                                @if ($users->login_level == 'pj')
                                                                    <button type="button" class="btn btn-sm btn-info mr-1"
                                                                        data-toggle="modal"
                                                                        data-target="#modal_konfirmasi{{ $lp->id }}">
                                                                        KONFIRMASI
                                                                    </button>
                                                                @endif
                                                            @break

                                                            @case(null)
                                                                <button type="button" class="btn btn-sm btn-warning mr-1">
                                                                    PENDING
                                                                </button>
                                                                @if ($users->login_level == 'pj')
                                                                    <button type="button" class="btn btn-sm btn-info mr-1"
                                                                        data-toggle="modal"
                                                                        data-target="#modal_konfirmasi{{ $lp->id }}">
                                                                        KONFIRMASI
                                                                    </button>
                                                                @endif
                                                            @break

                                                            @case('SETUJU')
                                                                <button type="button" class="btn btn-sm btn-success mr-1">
                                                                    DISETUJUI
                                                                </button>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                </div>
                                            </td>
                                        @endif

                                        <td class="">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto btn-group">
                                                    <button type="button" class="btn btn-sm btn-info ubah-button mr-1"
                                                        data-toggle="modal" data-target="#modal_ubah{{ $lp->id }}">
                                                        Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#modal_hapus{{ $lp->id }}">Hapus</button>

                                                    <!-- Modal Ubah -->
                                                    <div class="modal fade" id="modal_ubah{{ $lp->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Ubah Data Laporan
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form id="laporan-form"
                                                                    action="{{ route('edit-laporan') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="laporan_keterangan">Keterangan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="laporan_keterangan"
                                                                                            name="laporan_keterangan"
                                                                                            value="{{ $lp->laporan_keterangan }}"
                                                                                            >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="laporan_presentasi_pencapaian">
                                                                                            Pencapaian
                                                                                        </label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            id="laporan_presentasi_pencapaian"
                                                                                            name="laporan_presentasi_pencapaian"
                                                                                            value="{{ $lp->laporan_presentasi_pencapaian }}"
                                                                                            >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="created_at">Tgl/Waktu
                                                                                            Kegiatan</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="created_at"
                                                                                            name="created_at"
                                                                                            value="{{ $lp->created_at->format('Y-m-d') }}"
                                                                                            >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="laporan_rencana_kerja">
                                                                                            Rencana Kerja
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="laporan_rencana_kerja"
                                                                                            name="laporan_rencana_kerja"
                                                                                            value="{{ $lp->laporan_rencana_kerja }}"
                                                                                            >
                                                                                        </textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <label>Pilih Hari Kerja:</label>
                                                                                    <div class="checkbox-table d-flex justify-content-center mx-auto">
                                                                                        <table>
                                                                                            <tbody>
                                                                                                @for ($i = 1; $i <= 31; $i++)
                                                                                                    @if ($i % 10 == 1)
                                                                                                            <tr>
                                                                                                    @endif
                                                                                                        <td>
                                                                                                            <input
                                                                                                                type="checkbox"
                                                                                                                class="styled-checkbox"
                                                                                                                id="day{{ $i }}-{{ $lp->id }}"
                                                                                                                name="laporan_jumlah_hari[]"
                                                                                                                value="{{ $i }}">
                                                                                                            <label for="day{{ $i }}-{{ $lp->id }}">{{ $i }}</label>
                                                                                                        </td>
                                                                                                    @if ($i % 10 == 0 || $i == 31)
                                                                                                        </tr>
                                                                                                    @endif
                                                                                                @endfor
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="laporan_id"
                                                                            value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama"
                                                                            value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit"
                                                                            class="btn btn-outline-success">Setuju</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Konfirmasi -->
                                                    <div class="modal fade" id="modal_konfirmasi{{ $lp->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Konfirmasi Penyetujuan Laporan.
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin menyetujui Laporan ini?
                                                                        <br>
                                                                        Laporan : <b>{{ $lp->laporan_rencana_kerja }}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('konfirmasi-laporan') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="laporan_id"
                                                                            value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama"
                                                                            value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit"
                                                                            class="btn btn-outline-success">Setuju</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Hapus -->
                                                    <div class="modal fade" id="modal_hapus{{ $lp->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Peringatan
                                                                        Aksi!</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin menghapus item ini?
                                                                        <br>
                                                                        Laporan : <b>(Laporan)</b>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('hapus-laporan') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="hapus_id"
                                                                            value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama"
                                                                            value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/datatables') }}/datatables.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable({
        //     });
        // });

        $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#example').DataTable();

            // Event listener untuk dropdown bulan
            $('#filter-bulan').on('change', function() {
                var bulan = $(this)
            .val(); // Dapatkan nilai dari dropdown (misalnya: "2024-11" untuk November 2024)

                // Terapkan filter global pada seluruh tabel
                table.search(bulan).draw(); // Mencari nilai bulan di seluruh tabel
            });
        });

        $(document).ready(function() {
            $('.ubah-button').on('click', function() {
                // Ambil data JSON dari atribut data-jumlah-hari
                var id = $(this).data('id');
                var jumlahHariJson = $(this).attr(
                    'data-jumlah-hari'); // JSON yang berupa "[false, true, ...]"
                var jumlahHariArray = JSON.parse(jumlahHariJson); // Konversi ke array boolean

                // Pastikan jumlah data valid, yaitu 31 hari
                if (jumlahHariArray.length === 31) {
                    for (var i = 1; i <= 31; i++) {
                        // Set setiap checkbox berdasarkan nilai dari array jumlahHariArray
                        $('#day' + i + '-' + id).prop('checked', jumlahHariArray[i - 1]);
                    }
                } else {
                    console.error("Data hari tidak valid untuk laporan dengan ID " + id);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var reportCounts = {!! json_encode($reportCounts) !!};

            // Dapatkan nilai tertinggi dan terendah dari reportCounts
            var minValue = Math.min(...reportCounts); // Nilai terendah
            var maxValue = Math.max(...reportCounts); // Nilai tertinggi

            // Fungsi untuk memberikan warna berdasarkan nilai
            function getBarColor(value) {
                if (value === minValue) { // Jika nilai adalah yang terendah, beri warna merah
                    return 'rgba(255, 99, 132, 0.8)';
                } else if (value === maxValue) { // Jika nilai adalah yang tertinggi, beri warna hijau
                    return 'rgba(102, 255, 0, 0.8)';
                } else { // Jika nilai di antara terendah dan tertinggi, beri warna biru
                    return 'rgba(54, 162, 235, 0.8)';
                }
            }

            // Buat array warna berdasarkan data laporan
            var backgroundColors = reportCounts.map(function(value) {
                return getBarColor(value);
            });

            var ctx = document.getElementById('monthlyPerformanceChart').getContext('2d');
            var monthlyPerformanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dates) !!}, // Tanggal laporan
                    datasets: [{
                        label: 'Jumlah Laporan',
                        data: reportCounts, // Jumlah laporan harian
                        backgroundColor: backgroundColors, // Warna batang berdasarkan nilai laporan
                        borderColor: backgroundColors.map(color => color.replace('0.8',
                            '1')), // Warna border dengan opacity penuh
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
