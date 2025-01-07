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
    <title>LAPORAN BULAN {{ strtoupper($periode->periode_bulan) }} DIVISI {{ $divisi->divisi_nama }}</title>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mx-auto">
                <div class="data">
                    <div class="text text-center mt-5">
                        <p>RENCANA KERJA DIVISI {{ strtoupper($divisi->divisi_keterangan) }}</p>
                        <p>PT. KARTIKA PRIMA ABADI</p>
                        <p>BULAN {{ strtoupper($periode->periode_bulan) }} {{ $periode->periode_tahun }}</p>
                    </div>

                    <div class="table-data mt-5">
                        <table class="table-bordered border-1 border-dark text-center">

                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle p-2">NO.</th>
                                    <th style="min-width: 250px" rowspan="2" class="align-middle">RENCANA KERJA</th>
                                    <th colspan="{{ $days }}" class="align-middle">
                                        {{ strtoupper($periode->periode_bulan) }} {{ $periode->periode_tahun }}</th>
                                    <!-- Ubah kolom menjadi $days -->
                                    <th rowspan="2" class="align-middle p-2">PERSENTASE PENCAPAIAN</th>
                                    <th rowspan="2" class="align-middle p-2">KETERANGAN</th>
                                </tr>
                                @php
                                    use Carbon\Carbon;
                                    $currentDate = Carbon::create($currentyear, $selectedmonth, 1);
                                @endphp
                                <tr class="tanggal">
                                    @for ($i = 1; $i <= $days; $i++)
                                        <!-- Loop dari 1 sampai $days -->
                                        @php
                                            $date = $currentDate->copy()->day($i);
                                        @endphp

                                        <td style="background-color: {{ $date->isSunday() ? 'red' : 'transparent' }};">
                                            {{ $i }}
                                        </td>
                                    @endfor
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    // Inisialisasi array untuk menyimpan laporan yang dikelompokkan berdasarkan minggu
                                    $laporanPerMinggu = [];
                                @endphp

                                @foreach ($laporan as $lp)
                                    @php
                                        // Mengambil hari dari tanggal created_at
                                        $createdAt = \Carbon\Carbon::parse($lp->created_at);
                                        $dayOfMonth = $createdAt->day;

                                        // Tentukan minggu berdasarkan hari dalam bulan
                                        if ($dayOfMonth >= 1 && $dayOfMonth <= 8) {
                                            $weekNumber = 1;
                                            $weekStartDate = '1';
                                            $weekEndDate = '8';
                                        } elseif ($dayOfMonth >= 9 && $dayOfMonth <= 15) {
                                            $weekNumber = 2;
                                            $weekStartDate = '9';
                                            $weekEndDate = '15';
                                        } elseif ($dayOfMonth >= 16 && $dayOfMonth <= 22) {
                                            $weekNumber = 3;
                                            $weekStartDate = '16';
                                            $weekEndDate = '22';
                                        } elseif ($dayOfMonth >= 23 && $dayOfMonth <= 31) {
                                            $weekNumber = 4;
                                            $weekStartDate = '23';
                                            $weekEndDate = '31';
                                        }

                                        // Simpan laporan berdasarkan minggu dalam array
                                        $laporanPerMinggu[$weekNumber][
                                            'header'
                                        ] = "MINGGU {$weekNumber} ({$weekStartDate}-{$weekEndDate} {$periode->periode_bulan} {$periode->periode_tahun})";
                                        $laporanPerMinggu[$weekNumber]['data'][] = $lp;
                                    @endphp
                                @endforeach

                                {{-- Menampilkan data yang sudah dikelompokkan berdasarkan minggu --}}
                                @foreach ($laporanPerMinggu as $weekData)
                                    {{-- Tampilkan header minggu sekali saja --}}
                                    <tr>
                                        <td colspan="35" class="text-start fw-bold">{{ $weekData['header'] }}</td>
                                    </tr>

                                    @foreach ($weekData['data'] as $lp)
                                        <tr class="baris row-{{ $weekData['header'] }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-start">{!! $lp->laporan_rencana_kerja !!}</td>

                                            @php
                                                $jumlah_hari = json_decode($lp->laporan_jumlah_hari, true);
                                            @endphp

                                            @if ($lp->laporan_jumlah_hari == null)
                                                @for ($i = 1; $i <= $days; $i++)
                                                    {{-- Ganti < dengan <= --}}
                                                    <td class=""></td>
                                                @endfor
                                            @else
                                                @for ($i = 1; $i <= $days; $i++)
                                                    {{-- Ganti < dengan <= --}}
                                                    <td class="@if (isset($jumlah_hari[$i]) && $jumlah_hari[$i] === true) jadi-hitam @endif">
                                                    </td>
                                                @endfor
                                            @endif

                                            <td>
                                                @if ($lp->laporan_presentasi_pencapaian !== null)
                                                    @if ($lp->laporan_presentasi_pencapaian == 0)
                                                        Continue
                                                    @else
                                                        {{ $lp->laporan_presentasi_pencapaian }}%
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($lp->laporan_keterangan !== null)
                                                    {{ $lp->laporan_keterangan }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
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
