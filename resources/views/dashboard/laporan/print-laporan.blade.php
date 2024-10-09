<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .text p {
            margin: 0;
            font-weight: bold;
            font-size: 14px;
        }

        .jadi-hitam {
            background-color: #3b3b3b !important;
        }

        table {
            font-size: 14px;
            /* border: 1px solid black;

        border-collapse: collapse; */
            table-layout: auto !important;
        }

        table .tanggal {
            font-size: 16px;
            font-weight: bold;
        }

        .tanggal td {
            padding: 0 2px;
        }

        table tr.tanggal td:nth-child(1),
        table tr.tanggal td:nth-child(8),
        table tr.tanggal td:nth-child(15),
        table tr.tanggal td:nth-child(16),
        table tr.tanggal td:nth-child(22),
        table tr.tanggal td:nth-child(29) {
            background-color: rgb(239, 117, 117);
        }

        table tbody tr.baris td {
            font-size: 12px;
            /* font-weight: bold; */
        }

        /* table tr.row-1 td:nth-child(n + 3):nth-child(-n + 12),
        table tr.row-1 th:nth-child(n + 3):nth-child(-n + 12) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */ table tr.row-2 td:nth-child(n + 3):nth-child(-n + 33) {
            background-color: #3b3b3b;
        }

        table tr.row-3 td:nth-child(4),
        table tr.row-3 td:nth-child(5),
        table tr.row-3 td:nth-child(6),
        table tr.row-3 td:nth-child(7),
        table tr.row-3 td:nth-child(8),
        table tr.row-3 td:nth-child(11),
        table tr.row-3 td:nth-child(12),
        table tr.row-3 td:nth-child(13),
        table tr.row-3 td:nth-child(14),
        table tr.row-3 td:nth-child(15),
        table tr.row-3 td:nth-child(19),
        table tr.row-3 td:nth-child(20),
        table tr.row-3 td:nth-child(21),
        table tr.row-3 td:nth-child(22),
        table tr.row-3 td:nth-child(25),
        table tr.row-3 td:nth-child(26),
        table tr.row-3 td:nth-child(27),
        table tr.row-3 td:nth-child(28),
        table tr.row-3 td:nth-child(29),
        table tr.row-3 td:nth-child(32),
        table tr.row-3 td:nth-child(33) {
            background-color: #3b3b3b;
        }


        /* BATAS STYLE YANG DAPAT DI EDIT !!!  */
        /* table tr.row-5 td:nth-child(n + 4):nth-child(-n + 13) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-6 td:nth-child(n + 4):nth-child(-n + 8) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-7 td:nth-child(n + 4):nth-child(-n + 13) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-8 td:nth-child(n + 4):nth-child(-n + 5) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-9 td:nth-child(n + 6):nth-child(-n + 20) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-10 td:nth-child(n + 6):nth-child(-n + 7) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-11 td:nth-child(n + 6):nth-child(-n + 13) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-12 td:nth-child(n + 6):nth-child(-n + 9) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-13 td:nth-child(6),
        table tr.row-13 td:nth-child(32),
        table tr.row-14 td:nth-child(6),
        table tr.row-14 td:nth-child(32),
        table tr.row-15 td:nth-child(32),
        table tr.row-15 td:nth-child(6) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-17 td:nth-child(n + 20):nth-child(-n + 28) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-18 td:nth-child(n + 10):nth-child(-n + 17) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-20 td:nth-child(n + 14):nth-child(-n + 33),
        table tr.row-21 td:nth-child(n + 14):nth-child(-n + 33) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-22 td:nth-child(n + 15):nth-child(-n + 15) {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* table tr.row-24 td:nth-child(n + 19):nth-child(-n + 26),
        table tr.row-25 td:nth-child(n + 19):nth-child(-n + 26),
        table tr.row-26 td:nth-child(n + 19):nth-child(-n + 26)
        {
            background-color: #3b3b3b;
            /* Ganti dengan warna yang diinginkan */
        }

        */
        /* BATAS STYLE YANG DAPAT DI EDIT !!!  */
    </style>
    <title>Tabel Laporan</title>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="data">
                    <div class="text text-center mt-5">
                        <p>RENCANA KERJA HUMAN RESOURCES DEVELOPMENT</p>
                        <p>PT. KARTIKA PRIMA ABADI</p>
                        <p>BULAN SEPTEMBER 2024</p>
                    </div>

                    <div class="table-data mt-5">
                        <table class="table-bordered border-1 border-dark text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle p-2">NO.</th>
                                    <th style="min-width: 250px" rowspan="2" class="align-middle">RENCANA KERJA</th>
                                    <th colspan="31" class="align-middle">OKTOBER 2024</th>
                                    <th rowspan="2" class="align-middle p-2">PERSENTASE PENCAPAIAN</th>
                                    <th rowspan="2" class="align-middle p-2">KETERANGAN</th>
                                </tr>
                                <tr class="tanggal">
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td colspan="35" class="text-start fw-bold">MINGGU I(1-8 SEPT 2024)</td>
                                </tr>
                                @foreach ($laporan as $lp)
                                    @php
                                        $jumlah_hari = json_decode($lp->laporan_jumlah_hari, true);
                                    @endphp
                                    <tr class="baris row-1">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-start">{{ $lp->laporan_rencana_kerja }}</td>
                                        @foreach ($jumlah_hari as $hari_kerja)
                                            <td class="@if ($hari_kerja == true) jadi-hitam @endif">
                                            </td>
                                        @endforeach
                                        <td></td>
                                        <td></td>
                                        <td>100%</td>
                                        <td>Selesai</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="35" class="text-start fw-bold">MINGGU II(9-15 SEPT 2024)</td>
                                </tr>

                                <tr class="baris row-17">
                                    <td>1.</td>
                                    <td class="text-start">Pengajuan upah packing dan loading aspal dari kolam ke gudang
                                        tgl 9-16 Sept 2024</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai sampai pencaairan upah</td>
                                </tr>

                                <tr class="baris row-18">
                                    <td>2.</td>
                                    <td class="text-start">Laporan Insentif dan lembur bulan Agustus 2024</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="baris row-19">
                                    <td>3.</td>
                                    <td class="text-start">Klaim pertanggungan di BPJS Ketenagakerjaan:</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr class="baris row-20">
                                    <td></td>
                                    <td class="text-start">- Parisman (pengajuan pembayaran tidak masuk bekerja)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>70%</td>
                                    <td>Belum update informasi dari bpjs setelah surat klaim diajukan</td>
                                </tr>

                                <tr class="baris row-21">
                                    <td></td>
                                    <td class="text-start">- Gali Yulianto (pengajuan Klaim pembayaran tidak masuk
                                        bekerja)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>60%</td>
                                    <td>Surat Keterangan tidak masuk bekerja sudah ada</td>
                                </tr>

                                <tr class="baris row-22">
                                    <td>4.</td>
                                    <td class="text-start">- Penerimaan kunjungan dari polda sultra terkait sertifikat
                                        diklat security</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai</td>
                                </tr>

                                <tr>
                                    <td colspan="35" class="text-start fw-bold">MINGGU III(16-22 SEPT 2024)</td>
                                </tr>

                                <tr class="baris row-23">
                                    <td>1.</td>
                                    <td class="text-start">Laporan Rutin :</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai</td>
                                </tr>

                                <tr class="baris row-24">
                                    <td></td>
                                    <td class="text-start">- Upah Helper Geologist periode 1-15 September 2024</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai</td>
                                </tr>
                                <tr class="baris row-25">
                                    <td></td>
                                    <td class="text-start">- Laporan Tagihan Makan Kantin Daffa periode 1-15 September
                                        2024</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai</td>
                                </tr>

                                <tr class="baris row-26">
                                    <td></td>
                                    <td class="text-start">- Laporan absensi dan upah muttaqin periode 1-15 Oktober 2024
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>selesai</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
