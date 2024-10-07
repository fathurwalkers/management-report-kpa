@extends('layouts.dashboard-layout')

@section('title', '{$divisi} - PT. Kartika Prima Abadi')

@push('css')
    <link href="{{ asset('assets/datatables') }}/datatables.min.css" rel="stylesheet">
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
                            Upload Laporan
                        </b>
                    </h4>
                </div>
                <hr />

                <form action="">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Divisi</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    value="{{ $divisi_nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis Laporan</label>
                                <select class="form-control">
                                    <option>Excel</option>
                                    <option>PDF</option>
                                    <option>Word</option>
                                    <option>Lainnya. </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Keterangan</label>
                                <textarea name="" id="" cols="2" rows="2" class="form-control"
                                    id="exampleFormControlInput1">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="mr-2">Upload File Laporan</label>
                                <input type="file" name="" id="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="">Upload
                                Data</button>
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
                    <h4>
                        <b>
                            Laporan
                        </b>
                    </h4>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Divisi</th>
                                    <th>Jenis Laporan</th>
                                    <th>Tgl Upload. </th>
                                    <th>Jumlah Revisi</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($divisi as $div)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $div->divisi_nama }}</td>
                                        <td>File .PDF </td>
                                        <td>16/04/2025</td>
                                        <td>6</td>
                                        <td>Laporan Bulanan Departemen HRD, terkait penanganan karyawan</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                data-dismiss="modal">DIPROSES</button>
                                        </td>
                                        <td class="mx-auto btn-group">
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                        <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#modal_hapus{{ $div->id }}">Hapus</button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modal_hapus{{ $div->id }}" tabindex="-1"
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
                                @endforeach

                                <tr>
                                    <td>1</td>
                                    <td>IT</td>
                                    <td>File Excel </td>
                                    <td>04/02/2025</td>
                                    <td>2</td>
                                    <td>Laporan Bulanan terkait proses kinerja pembuatan Tower untuk Penempatan Akses
                                        Jaringan Server baru pada Control Room</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success"
                                            data-dismiss="modal">SELESAI</button>
                                    </td>
                                    <td class="mx-auto btn-group">
                                        {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                    <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal_hapus{{ $div->id }}">Hapus</button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modal_hapus{{ $div->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabelLogout">Peringatan
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
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>Purchasing</td>
                                    <td>File Excel </td>
                                    <td>08/02/2025</td>
                                    <td>7</td>
                                    <td>
                                        Laporan Bulanan terkait perbelanjaan barang untuk keperluan produksi dan umum.
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            data-dismiss="modal">PENDING</button>
                                    </td>
                                    <td class="mx-auto btn-group">
                                        {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                    <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal_hapus{{ $div->id }}">Hapus</button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modal_hapus{{ $div->id }}" tabindex="-1"
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
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

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
@endpush
