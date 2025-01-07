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
                <h1 class="m-0">Divisi {{ $divisi->divisi_nama }}</h1>
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

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h4>
                            <b>
                                Daftar Karyawan - Divsi {{ $divisi->divisi_nama }}
                            </b>
                        </h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button class="btn btn-sm btn-info">
                            Dashboard /
                            <b>
                                Daftar Karyawan
                            </b>
                        </button>
                    </div><!-- /.col -->
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Divisi</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Jabatan</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($login as $lp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $lp->divisi->divisi_nama }}</td>
                                        <td>{{ $lp->login_nama }}</td>
                                        <td class="text-center">{{ $lp->login_username }}</td>
                                        <td class="text-center">{{ $lp->login_jabatan }}</td>
                                        {{-- <td class="text-center">{{ $lp->login_level }}</td> --}}
                                        <td class="">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-success mr-1">Lihat</button>
                                                    {{-- <button type="button" class="btn btn-sm btn-info ubah-button mr-1">
                                                        Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal_hapus{{ $lp->id }}">Hapus</button> --}}

                                                    <!-- Modal Hapus -->
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
                                                                        Laporan : <b>{{ $lp->login_nama }}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="#" method="POST">
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
            $('#example').DataTable({});
        });
    </script>
@endpush
