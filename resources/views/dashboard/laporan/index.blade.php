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
@endpush

@section('content-header')
    <div class="container-fluid">
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
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">

                <div class="row">
                    <h4>
                        <b>
                            Input Data Laporan
                        </b>
                    </h4>
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

                <form action="{{ route('proses-laporan') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="laporan_keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="laporan_keterangan"
                                    name="laporan_keterangan">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="laporan_presentasi_pencapaian">Presentasi Pencapaian</label>
                                <input type="number" class="form-control" id="laporan_presentasi_pencapaian"
                                    name="laporan_presentasi_pencapaian">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="laporan_rencana_kerja">Rencana Kerja</label>
                                <textarea id="laporan_rencana_kerja" cols="1" rows="4" class="form-control" id="laporan_rencana_kerja"
                                    name="laporan_rencana_kerja">
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
                                            <input type="checkbox" id="day{{ $i }}" class="styled-checkbox"
                                                name="laporan_jumlah_hari[]" value="{{ $i }}">
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

                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="">Pilih Tanggal Kerja</label>

                            <table class="checkbox-table">
                                <tbody>
                                    @for ($i = 1; $i <= $jumlah_hari; $i++)
                                        @if ($i % 7 == 1)
                                            <tr>
                                        @endif
                                        <td>
                                            <input type="checkbox" id="day{{ $i }}" class="styled-checkbox"
                                                name="laporan_jumlah_hari[]" value="{{ $i }}">
                                            <label for="day{{ $i }}">
                                                {{ $i }}
                                            </label>
                                        </td>
                                        @if ($i % 7 == 0 || $i == $jumlah_hari)
                                            </tr>
                                        @endif
                                    @endfor
                                </tbody>
                            </table>

                        </div>
                    </div> --}}

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
                                <button type="button" class="btn btn-warning"
                                    onclick="location.href = '{{ route('print-laporan') }}';">
                                    Print Laporan
                                </button>
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
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach ($laporan as $lp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lp->divisi->divisi_nama }}</td>
                                        <td>{{ $lp->login->login_nama }}</td>
                                        <td>{{ $lp->laporan_rencana_kerja }}</td>
                                        <td>{{ $lp->laporan_presentasi_pencapaian }}</td>
                                        <td>{{ $lp->laporan_keterangan }}</td>
                                        <td>{{ $lp->created_at }}</td>

                                        <td class="mx-auto btn-group">
                                            <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                            <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#modal_hapus{{ $lp->id }}">Hapus</button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modal_hapus{{ $lp->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Peringatan
                                                                Aksi!</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                            <form action="#" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="hapus_id" value="#">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach --}}

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
            $('#example').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            function fetchLaporan() {
                $.ajax({
                    url: '{{ route('get-laporan') }}', // Use the named route
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tbody = $('#example tbody');
                        tbody.empty(); // Clear existing data
                        $.each(data, function(index, lp) {
                            tbody.append('<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + lp.divisi.divisi_nama + '</td>' +
                                '<td>' + lp.login.login_nama + '</td>' +
                                '<td>' + lp.laporan_rencana_kerja + '</td>' +
                                '<td>' + lp.laporan_presentasi_pencapaian + '</td>' +
                                '<td>' + lp.laporan_keterangan + '</td>' +
                                '<td>' + lp.created_at + '</td>' +
                                '<td class="mx-auto btn-group">' +
                                '<button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>' +
                                '<button type="button" class="btn btn-sm btn-info mr-1">Ubah</button>' +
                                '<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus' +
                                lp.id + '">Hapus</button>' +

                                // Modal Hapus
                                '<div class="modal fade" id="modal_hapus' + lp.id +
                                '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">' +
                                '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content">' +
                                '<div class="modal-header">' +
                                '<h5 class="modal-title">Peringatan Aksi!</h5>' +
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>' +
                                '<div class="modal-body">' +
                                '<p>Apakah anda yakin ingin menghapus item ini?' +
                                '<br>Laporan : <b>(' + lp.laporan_rencana_kerja +
                                ')</b></p>' +
                                '</div>' +
                                '<div class="modal-footer">' +
                                '<form action="#" method="POST">' +
                                '@csrf' + // Ensure CSRF token is included
                                '<input type="hidden" name="hapus_id" value="' + lp.id +
                                '">' +
                                '<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batalkan</button>' +
                                '<button type="submit" class="btn btn-primary">Hapus</button>' +
                                '</form>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +

                                '</td></tr>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Fetch data on page load
            fetchLaporan();

            // Optional: Set interval to refresh data every 5 seconds
            setInterval(fetchLaporan, 5000);
        });
    </script>
@endpush
