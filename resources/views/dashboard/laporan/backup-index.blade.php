@extends('layouts.dashboard-layout')

@section('title', '{$divisi} - PT. Kartika Prima Abadi')

@push('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/7bx5ix0kiz0jq65g6z92wco2179whyg3gcv8yj446kc9gwrg/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
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

                        <form id="laporan-form" action="{{ route('proses-laporan') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-1">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="mt-1">
                                        @php
                                            $array_divisi_office = [3, 5];
                                            $array_divisi_lain = [
                                                1,
                                                6,
                                                7,
                                                10,
                                                11,
                                                12,
                                                13,
                                                14,
                                                15,
                                                17,
                                                18,
                                                19,
                                                20,
                                                21,
                                                22,
                                                23,
                                                24,
                                                25,
                                                26,
                                                27,
                                                28,
                                                29,
                                                30,
                                                31,
                                                32,
                                                33,
                                            ];
                                        @endphp
                                        <label for="areakerja">
                                            Area Kerja :
                                            <span id="areakerjaspan">
                                                @if (in_array($users->divisi_id, $array_divisi_office))
                                                    Office
                                                @endif
                                            </span>
                                        </label>
                                        <div id="areakerja" class="">
                                            @switch(true)
                                                @case(in_array($users->divisi_id, $array_divisi_office))
                                                    <input type="hidden" name="areakerja" value="24" id="hiddenInput">
                                                @break

                                                @case(in_array($users->divisi_id, $array_divisi_lain))
                                                    <input type="hidden" name="areakerja" value="" id="hiddenInput">
                                                    @foreach ($area as $aresss)
                                                        <button type="button" class="btn btn-primary mr-1 mb-1"
                                                            onclick="setValue('{{ $aresss->areakerja_lokasi }}')">
                                                            {{ $aresss->areakerja_lokasi }}
                                                        </button>
                                                    @endforeach
                                                @break

                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-1">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                        <textarea id="laporan_rencana_kerja" class="form-control" name="laporan_rencana_kerja">
                                        Silahkan mengetikkan laporan anda disini...
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <p>
                                            <b>
                                                <span style="color:red;">
                                                    * NOTE :
                                                </span>
                                            </b>
                                            Klik pada kotak Checkbox jika anda ingin membuat Laporan ini hanya ditujukan
                                            pada User tertentu saja.
                                        </p>
                                        <input type="checkbox" id="toggleLaporanTujuan" />
                                        <label for="toggleLaporanTujuan">Pilih User untuk Laporan Tujuan</label>
                                    </div>

                                    <div class="form-group" id="laporanTujuanRow" style="display: none;">
                                        <label for="laporan_tujuan">Pilih User</label>
                                        <select name="laporan_tujuan" id="laporan_tujuan" class="form-control">
                                            <option value="">-- Pilih User --</option>
                                            @foreach ($logins as $login)
                                                <option value="{{ $login->id }}">{{ $login->login_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <p>
                                    <b>
                                        <span style="color:red;">
                                            * NOTE :
                                        </span>
                                    </b>
                                    Kosongkan <span style="color:red;">Waktu Kegiatan</span> jika tidak diperlukan, untuk
                                    Presentasi Pencapaian, jika belum ada progress yang berlalu bisa di isi 0 persen saja.
                                </p>
                            </div>
                            <div class="row mb-1">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="laporan_keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="laporan_keterangan"
                                            name="laporan_keterangan" required>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                        <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                            name="laporan_presentasi_pencapaian" required>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="created_at_waktu">Tanggal Kegiatan</label>
                                        <input type="date" class="form-control" id="created_at_tanggal"
                                            name="created_at_tanggal" required>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="created_at_waktu">Waktu Kegiatan</label>
                                        <input type="time" class="form-control" id="created_at_waktu"
                                            name="created_at_waktu">
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <p>
                                        <b>
                                            <span style="color:red;">
                                                * NOTE :
                                            </span>
                                        </b>
                                        Tekan tombol "Tambah Dokumen" jika anda ingin melampirkan satu atau beberapa Dokumen
                                        pada Data Laporan ini.
                                    </p>
                                    <button type="button" onclick="event.preventDefault()" id="tambahDokumenBtn"
                                        class="btn btn-primary mb-3">Tambah Dokumen</button>
                                </div>
                            </div>

                            <div id="formContainer"></div>

                            <hr />

                            <div class="row mb-2">
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

                            <div class="row mb-1 mt-2">
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

                    <form id="laporan-form" action="{{ route('proses-laporan') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-1">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="mt-1">
                                    @php
                                        $array_divisi_office = [2, 3, 4, 5, 8, 9];
                                        $array_divisi_lain = [
                                            1,
                                            6,
                                            7,
                                            10,
                                            11,
                                            12,
                                            13,
                                            14,
                                            15,
                                            17,
                                            18,
                                            19,
                                            20,
                                            21,
                                            22,
                                            23,
                                            24,
                                            25,
                                        ];
                                    @endphp
                                    <label for="areakerja">
                                        Area Kerja :
                                        <span id="areakerjaspan">
                                            @if (in_array($users->divisi_id, $array_divisi_office))
                                                Office
                                            @endif
                                        </span>
                                    </label>
                                    <div id="areakerja" class="">
                                        @switch(true)
                                            @case(in_array($users->divisi_id, $array_divisi_office))
                                                <input type="hidden" name="areakerja" value="24" id="hiddenInput">
                                            @break

                                            @case(in_array($users->divisi_id, $array_divisi_lain))
                                                <input type="hidden" name="areakerja" value="" id="hiddenInput">
                                                @foreach ($area as $aresss)
                                                    <button type="button" class="btn btn-primary mr-1 mb-1"
                                                        onclick="setValue('{{ $aresss->areakerja_lokasi }}')">
                                                        {{ $aresss->areakerja_lokasi }}
                                                    </button>
                                                @endforeach
                                            @break

                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row mb-1">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                    <textarea id="laporan_rencana_kerja" class="form-control" name="laporan_rencana_kerja">
                                    Silahkan mengetikkan laporan anda disini...
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <p>
                                        <b>
                                            <span style="color:red;">
                                                * NOTE :
                                            </span>
                                        </b>
                                        Klik pada kotak Checkbox jika anda ingin membuat Laporan ini hanya ditujukan pada
                                        User tertentu saja.
                                    </p>
                                    <input type="checkbox" id="toggleLaporanTujuan" />
                                    <label for="toggleLaporanTujuan">Pilih User untuk Laporan Tujuan</label>
                                </div>

                                <div class="form-group" id="laporanTujuanRow" style="display: none;">
                                    <label for="laporan_tujuan">Pilih User</label>
                                    <select name="laporan_tujuan" id="laporan_tujuan" class="form-control">
                                        <option value="">-- Pilih User --</option>
                                        @foreach ($logins as $login)
                                            <option value="{{ $login->id }}">{{ $login->login_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <p>
                                <b>
                                    <span style="color:red;">
                                        * NOTE :
                                    </span>
                                </b>
                                Kosongkan <span style="color:red;">Waktu Kegiatan</span> jika tidak diperlukan, untuk
                                Presentasi Pencapaian, jika belum ada progress yang berlalu bisa di isi 0 persen saja.
                            </p>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="laporan_keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="laporan_keterangan"
                                        name="laporan_keterangan" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                    <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                        name="laporan_presentasi_pencapaian" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="created_at_waktu">Tanggal Kegiatan</label>
                                    <input type="date" class="form-control" id="created_at_tanggal"
                                        name="created_at_tanggal" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="created_at_waktu">Waktu Kegiatan</label>
                                    <input type="time" class="form-control" id="created_at_waktu"
                                        name="created_at_waktu">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <p>
                                    <b>
                                        <span style="color:red;">
                                            * NOTE :
                                        </span>
                                    </b>
                                    Tekan tombol "Tambah Dokumen" jika anda ingin melampirkan satu atau beberapa Dokumen
                                    pada Data Laporan ini.
                                </p>
                                <button type="button" onclick="event.preventDefault()" id="tambahDokumenBtn"
                                    class="btn btn-primary mb-3">Tambah Dokumen</button>
                            </div>
                        </div>

                        <div id="formContainer"></div>

                        <hr />

                        <div class="row mb-2">
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

                        <div class="row mb-1 mt-2">
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
                                    @foreach (range(1, 24) as $bulan)
                                        <form action="{{ route('print-laporan') }}" method="POST" class="m-0">
                                            @csrf
                                            @php
                                                $tahun = '2024';
                                            @endphp
                                            <input type="hidden" name="divisi_nama" value="{{ $divisi_nama }}">
                                            <input type="hidden" name="bulan" value="{{ $bulan }}">
                                            <button type="submit" class="dropdown-item">
                                                @if ($bulan >= 13)
                                                    @php
                                                        $tahun = '2025';
                                                    @endphp
                                                @endif
                                                {{ date('F', mktime(0, 0, 0, $bulan, 1)) }} ({{ $tahun }})
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
                    <div class="table-light table-responsive">
                        <table id="example" class="display table-bordered nowrap" style="width:100%">
                            @php
                                $array_divisi_office = [2, 3, 4, 5, 8, 9];
                                $array_divisi_lain = [
                                    1,
                                    6,
                                    7,
                                    10,
                                    11,
                                    12,
                                    13,
                                    14,
                                    15,
                                    17,
                                    18,
                                    19,
                                    20,
                                    21,
                                    22,
                                    23,
                                    24,
                                    25,
                                ];
                            @endphp
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Divisi</th>
                                    @if (in_array($users->divisi_id, $array_divisi_lain))
                                        <th>Area Kerja</th>
                                    @endif
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
                                        <td class="text-center">
                                            <b>{{ strtoupper($lp->divisi->divisi_nama) }}</b>
                                        </td>
                                        @if (in_array($users->divisi_id, $array_divisi_lain))
                                            <td class="text-center">
                                                @if ($lp->area_id === null)
                                                    Tidak Ada
                                                @else
                                                    {{ $lp->area->areakerja_lokasi }}
                                                @endif
                                            </td>
                                        @endif
                                        <td>{{ $lp->login->login_nama }}</td>
                                        <td class="">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @php
                                                    $file = \App\Models\File::where('laporan_id', $lp->id)->get();
                                                    $array_dokumen = ['pdf', 'doc', 'docs', 'xls', 'xlsx'];
                                                    $array_gambar = [
                                                        'png',
                                                        'PNG',
                                                        'jpg',
                                                        'JPG',
                                                        'jpeg',
                                                        'JPEG',
                                                        'webp',
                                                    ];
                                                @endphp
                                                @if ($file->isNotEmpty())
                                                    @foreach ($file as $ff)
                                                        <button type="button" class="badge badge-sm badge-info"
                                                            onclick="window.open('{{ route('file-preview', ['id' => $ff->id]) }}', '_blank')">
                                                            @if (in_array($ff->file_extensi, $array_dokumen))
                                                                Dokumen Terlampir <span style="color:green;">Lihat
                                                                    Lampiran</span>
                                                            @elseif (in_array($ff->file_extensi, $array_gambar))
                                                                Gambar Terlampir <span style="color:green;">Lihat
                                                                    Lampiran</span>
                                                            @endif
                                                        </button>
                                                    @endforeach
                                                @else
                                                @endif
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                {!! $lp->laporan_rencana_kerja !!}
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $lp->laporan_presentasi_pencapaian }}%</td>
                                        <td class="text-center">{{ $lp->laporan_keterangan }}</td>
                                        <td>{{ $lp->created_at }}</td>
                                        @if ($users->divisi_id !== 26)
                                            <td class="">
                                                <div class="row mx-auto">
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
                                                                <form id="laporan-form{{ $lp->id }}"
                                                                    action="{{ route('edit-laporan') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="current_page"
                                                                        id="current_page_ubah{{ $lp->id }}"
                                                                        value="">
                                                                    <div class="modal-body">

                                                                        <div class="container">
                                                                            <div class="row mb-1">
                                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="laporan_keterangan{{ $lp->id }}">Keterangan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="laporan_keterangan{{ $lp->id }}"
                                                                                            name="laporan_keterangan"
                                                                                            value="{{ $lp->laporan_keterangan }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="laporan_presentasi_pencapaian{{ $lp->id }}">Presentasi
                                                                                            Pencapaian</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            id="laporan_presentasi_pencapaian{{ $lp->id }}"
                                                                                            name="laporan_presentasi_pencapaian"
                                                                                            value="{{ $lp->laporan_presentasi_pencapaian }}">
                                                                                    </div>
                                                                                </div>
                                                                                @php
                                                                                    $update_created_at = \Illuminate\Support\Carbon::parse(
                                                                                        $lp->created_at,
                                                                                    );
                                                                                    $update_tanggal = $update_created_at->format(
                                                                                        'Y-m-d',
                                                                                    );
                                                                                    $update_waktu = $update_created_at->format(
                                                                                        'H:i',
                                                                                    );
                                                                                @endphp
                                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="created_at_tanggal{{ $lp->id }}">Tanggal
                                                                                            Kegiatan</label>
                                                                                        <input
                                                                                            value="{{ $update_tanggal }}"
                                                                                            type="date"
                                                                                            class="form-control"
                                                                                            id="created_at_tanggal{{ $lp->id }}"
                                                                                            name="created_at_tanggal">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="created_at_waktu{{ $lp->id }}">Waktu
                                                                                            Kegiatan</label>
                                                                                        <input value="{{ $update_waktu }}"
                                                                                            type="time"
                                                                                            class="form-control"
                                                                                            id="created_at_waktu{{ $lp->id }}"
                                                                                            name="created_at_waktu">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-1">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="laporan_rencana_kerja{{ $lp->id }}">Rencana
                                                                                            Kerja</label>
                                                                                        <textarea id="laporan_rencana_kerja{{ $lp->id }}" class="form-control laporan_rencana_kerjatextarea_class"
                                                                                            name="laporan_rencana_kerja">
                                                                                            {{ $lp->laporan_rencana_kerja }}
                                                                                        </textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <label for="">Pilih Tanggal
                                                                                        Kerja</label>

                                                                                    <table class="checkbox-table">
                                                                                        <tbody>
                                                                                            @php
                                                                                                switch (
                                                                                                    $lp->periode
                                                                                                        ->periode_bulan_int
                                                                                                ) {
                                                                                                    case 1: // Januari
                                                                                                    case 3: // Maret
                                                                                                    case 5: // Mei
                                                                                                    case 7: // Juli
                                                                                                    case 8: // Agustus
                                                                                                    case 10: // Oktober
                                                                                                    case 12: // Desember
                                                                                                        $bb_the_jumlah_hari =
                                                                                                            31 + 1;
                                                                                                        // $bb_the_jumlah_hari =- 1;
                                                                                                        break;
                                                                                                    case 4: // April
                                                                                                    case 6: // Juni
                                                                                                    case 9: // September
                                                                                                    case 11: // November
                                                                                                        $bb_the_jumlah_hari =
                                                                                                            30 + 1;
                                                                                                        // $bb_the_jumlah_hari =- 1;
                                                                                                        break;
                                                                                                    case 2: // Februari
                                                                                                        // Mengecek tahun kabisat untuk Februari
                                                                                                        $der =
                                                                                                            $lp->periode
                                                                                                                ->periode_tahun %
                                                                                                                4 ==
                                                                                                                0 &&
                                                                                                            ($lp
                                                                                                                ->periode
                                                                                                                ->periode_tahun %
                                                                                                                100 !=
                                                                                                                0 ||
                                                                                                                $lp
                                                                                                                    ->periode
                                                                                                                    ->periode_tahun %
                                                                                                                    400 ==
                                                                                                                    0)
                                                                                                                ? 29
                                                                                                                : 28;
                                                                                                        $bb_the_jumlah_hari =
                                                                                                            $der + 1;
                                                                                                        break;
                                                                                                }
                                                                                                if (
                                                                                                    $lp->laporan_jumlah_hari ===
                                                                                                        null ||
                                                                                                    $lp->laporan_jumlah_hari ===
                                                                                                        '' ||
                                                                                                    $lp->laporan_jumlah_hari ===
                                                                                                        'null' ||
                                                                                                    !isset(
                                                                                                        $lp->laporan_jumlah_hari,
                                                                                                    ) ||
                                                                                                    strlen(
                                                                                                        $lp->laporan_jumlah_hari,
                                                                                                    ) === 0 ||
                                                                                                    (is_array(
                                                                                                        $lp->laporan_jumlah_hari,
                                                                                                    ) &&
                                                                                                        count(
                                                                                                            $lp->laporan_jumlah_hari,
                                                                                                        ) === 0)
                                                                                                ) {
                                                                                                    $decode_jumlah_hari = null;
                                                                                                    $the_jumlah_hari = $bb_the_jumlah_hari;
                                                                                                } else {
                                                                                                    $decode_jumlah_hari = json_decode(
                                                                                                        $lp->laporan_jumlah_hari,
                                                                                                        true,
                                                                                                    );
                                                                                                    // array_shift($decode_jumlah_hari);
                                                                                                    $the_jumlah_hari = count(
                                                                                                        $decode_jumlah_hari,
                                                                                                    );
                                                                                                }
                                                                                            @endphp
                                                                                            @for ($i = 1; $i < $the_jumlah_hari; $i++)
                                                                                                @if ($i % 10 == 1)
                                                                                                    <tr>
                                                                                                @endif
                                                                                                <td>
                                                                                                    <input type="checkbox"
                                                                                                        id="day{{ $lp->id }}{{ $i }}"
                                                                                                        class="styled-checkbox"
                                                                                                        name="laporan_jumlah_hari[]"
                                                                                                        value="{{ $i }}"
                                                                                                        @if ($decode_jumlah_hari !== null) @if ($decode_jumlah_hari[$i] == true)
                                                                                                                checked @endif
                                                                                                        @endif
                                                                                                    >
                                                                                                    <label
                                                                                                        for="day{{ $lp->id }}{{ $i }}">
                                                                                                        {{ $i }}
                                                                                                    </label>
                                                                                                </td>
                                                                                                @if ($i % 10 == 0 || $i == $the_jumlah_hari)
                                                                                                    </tr>
                                                                                                @endif
                                                                                            @endfor
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="laporan_id" value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama" value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit" class="btn btn-outline-success"
                                                                            onclick="setPage_ubah('current_page_ubah{{ $lp->id }}')">Setuju</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Konfirmasi -->
                                                    <div class="modal fade" id="modal_konfirmasi{{ $lp->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Konfirmasi Penyetujuan Laporan.
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                    <form action="{{ route('konfirmasi-laporan') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="current_page" id="current_page_konfirmasi{{ $lp->id }}"
                                                                            value="">
                                                                        <input type="hidden" name="laporan_id" value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama" value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit" class="btn btn-outline-success"
                                                                            onclick="setPage_konfirmasi('current_page_konfirmasi{{ $lp->id }}')">Setuju</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Hapus -->
                                                    <div class="modal fade" id="modal_hapus{{ $lp->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Peringatan
                                                                        Aksi!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                    <form action="{{ route('hapus-laporan') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="current_page" id="current_page_hapus{{ $lp->id }}"
                                                                            value="">
                                                                        <input type="hidden" name="hapus_id" value="{{ $lp->id }}">
                                                                        <input type="hidden" name="divisi_nama" value="{{ $lp->divisi->divisi_nama }}">
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            onclick="setPage_hapus('current_page_hapus{{ $lp->id }}')">Hapus</button>
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
        tinymce.init({
            selector: 'textarea',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
                'searchreplace', 'table', 'visualblocks', 'wordcount'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                'See docs to implement AI Assistant')),
            exportpdf_converter_options: {
                'format': 'Letter',
                'margin_top': '1in',
                'margin_right': '1in',
                'margin_bottom': '1in',
                'margin_left': '1in'
            },
            exportword_converter_options: {
                'document': {
                    'size': 'Letter'
                }
            },
            importword_converter_options: {
                'formatting': {
                    'styles': 'inline',
                    'resets': 'inline',
                    'defaults': 'inline',
                }
            },
        });
    </script>
    <script>
        function setValue(value) {
            document.getElementById("hiddenInput").value = value;
            document.getElementById("areakerjaspan").innerHTML = " " + value + " ";
        }

        function setPage_ubah(set_current_page_id_ubah) {
            var page = table.page.info().page;
            document.getElementById(id_page).value = page;
        }

        function setPage_konfirmasi(set_current_page_id_konfirmasi) {
            var page = table.page.info().page;
            document.getElementById(set_current_page_id_konfirmasi).value = page;
        }

        function setPage_hapus(set_current_page_id_hapus) {
            var page = table.page.info().page;
            document.getElementById(set_current_page_id_hapus).value = page;
        }

        $(document).ready(function() {
            var table = $('#example').DataTable({});

            $('#filter-bulan').on('change', function() {
                var selectedValue = $(this).val();
                table.search(selectedValue).draw();
            });
            $('.ubah-button').on('click', function() {
                var id = $(this).data('id');
                var jumlahHariJson = $(this).attr('data-jumlah-hari');
                var jumlahHariArray = JSON.parse(jumlahHariJson);
                if (jumlahHariArray.length === 31) {
                    for (var i = 1; i <= 31; i++) {
                        $('#day' + i + '-' + id).prop('checked', jumlahHariArray[i - 1]);
                    }
                } else {
                    console.error("Data hari tidak valid untuk laporan dengan ID " + id);
                }
            });
            document.getElementById('toggleLaporanTujuan').addEventListener('change', function() {
                var laporanTujuanRow = document.getElementById('laporanTujuanRow');
                if (this.checked) {
                    laporanTujuanRow.style.display = 'block';
                } else {
                    laporanTujuanRow.style.display = 'none';
                }
            });
            let fileIndex = 1;
            $('#tambahDokumenBtn').click(function() {
                const formRow = `
                    <div class="form-group row" id="rowFile${fileIndex}">
                        <label for="laporan_file${fileIndex}" class="col-sm-2 col-form-label">Upload Dokumen</label>
                        <div class="col-sm-8">
                            <input type="file" name="laporan_file[]" id="laporan_file${fileIndex}" class="form-control-file">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger btn-sm remove-file-btn">Hapus</button>
                        </div>
                    </div>
                `;
                $('#formContainer').append(formRow);
                fileIndex++;
            });
            $('#formContainer').on('click', '.remove-file-btn', function() {
                $(this).closest('.form-group').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var reportCounts = {!! json_encode($reportCounts) !!};
            var minValue = Math.min(...reportCounts);
            var maxValue = Math.max(...reportCounts);

            function getBarColor(value) {
                if (value === minValue) {
                    return 'rgba(255, 99, 132, 0.8)';
                } else if (value === maxValue) {
                    return 'rgba(102, 255, 0, 0.8)';
                } else {
                    return 'rgba(54, 162, 235, 0.8)';
                }
            }
            var backgroundColors = reportCounts.map(function(value) {
                return getBarColor(value);
            });
            var ctx = document.getElementById('monthlyPerformanceChart').getContext('2d');
            var monthlyPerformanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dates) !!},
                    datasets: [{
                        label: 'Jumlah Laporan',
                        data: reportCounts,
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors.map(color => color.replace('0.8',
                            '1')),
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
