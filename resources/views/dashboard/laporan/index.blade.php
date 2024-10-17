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
    @endphp
    @if ($isHRD && $divisi_page == 2)
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
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="laporan_keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="laporan_keterangan"
                                    name="laporan_keterangan" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                    name="laporan_presentasi_pencapaian" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="created_at">Tgl/Waktu Kegiatan</label>
                                <input type="date" class="form-control" id="created_at" name="created_at" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                {{-- <textarea id="laporan_rencana_kerja" cols="1" rows="4" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja"> --}}
                                    <input type="text" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja" required>
                        </textarea>
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
                                        name="laporan_presentasi_pencapaian" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="created_at">Tgl/Waktu Kegiatan</label>
                                    <input type="date" class="form-control" id="created_at" name="created_at" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                {{-- <textarea id="laporan_rencana_kerja" cols="1" rows="4" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja"> --}}
                                    <input type="text" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja" required>
                            </textarea>
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
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4>
                            <b>
                                Laporan
                            </b>
                        </h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <h4>
                            <b>
                                <form action="{{ route('print-laporan') }}" method="POST">
                                    @csrf
                                        <input type="hidden" name="divisi_nama" value="{{ $divisi_nama }}">
                                        <button type="submit" class="btn btn-warning">
                                            Print Laporan
                                        </button>
                                </form>
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
                                                        data-toggle="modal"
                                                        data-target="#modal_ubah{{ $lp->id }}">
                                                        Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#modal_hapus{{ $lp->id }}">Hapus</button>

                                                        <!-- Modal Ubah -->
                                                    <div class="modal fade" id="modal_ubah{{ $lp->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
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
                                                                <form id="laporan-form" action="{{ route('edit-laporan') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="laporan_keterangan">Keterangan</label>
                                                                                        <input type="text" class="form-control" id="laporan_keterangan"
                                                                                            name="laporan_keterangan" value="{{ $lp->laporan_keterangan }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="laporan_presentasi_pencapaian">
                                                                                            Pencapaian
                                                                                        </label>
                                                                                        <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                                                                            name="laporan_presentasi_pencapaian" value="{{ $lp->laporan_presentasi_pencapaian }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label for="created_at">Tgl/Waktu Kegiatan</label>
                                                                                        <input type="date" class="form-control" id="created_at" name="created_at" value="{{ $lp->created_at->format('Y-m-d') }}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="laporan_rencana_kerja">
                                                                                            Rencana Kerja
                                                                                        </label>
                                                                                            <input type="text" class="form-control" id="laporan_rencana_kerja"
                                                                                            name="laporan_rencana_kerja" value="{{ $lp->laporan_rencana_kerja }}" required>
                                                                                </textarea>
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
        $(document).ready(function() {
            $('#example').DataTable({

            });
        });

        $(document).ready(function() {
            $('.ubah-button').on('click', function() {
                // Ambil data dari button yang diklik
                var id = $(this).data('id');
                var keterangan = $(this).data('keterangan');
                var presentasi = $(this).data('presentasi');
                var rencana = $(this).data('rencana');

                // Ambil hari yang dipilih dari laporan_jumlah_hari
                var selectedDays = JSON.parse($(this).attr('data-selected-days'));

                // Set nilai input di form
                $('#laporan_keterangan').val(keterangan);
                $('#laporan_presentasi_pencapaian').val(presentasi);
                $('#laporan_rencana_kerja').val(rencana);

                // Hapus input hidden sebelumnya jika ada
                $('#laporan-form input[name="laporan_id"]').remove();

                // Tambahkan input hidden untuk ID laporan
                $('<input>').attr({
                    type: 'hidden',
                    id: 'laporan_id',
                    name: 'laporan_id',
                    value: id
                }).appendTo('#laporan-form');

                // Ubah action form ke edit-laporan dengan ID laporan
                $('#laporan-form').attr('action', '{{ route('edit-laporan') }}');

                // // Reset semua checkbox
                // $('.checkbox-table input[type="checkbox"]').prop('checked', false);
                // console.log(selectedDays);
                // // Centang checkbox berdasarkan data hari yang dipilih
                // if (selectedDays) {
                //     selectedDays.forEach(function(day) {
                //         $('#day' + day).prop('checked', true);
                //     });
                // }
                if (selectedDays && selectedDays.length > 0) {
                    selectedDays.forEach(function(day) {
                        $('#day' + day).prop('checked', true);
                    });
                } else {
                    // Jika tidak ada yang dipilih, berikan nilai false
                    selectedDays = false;
                }
            });
        });
    </script>
@endpush
