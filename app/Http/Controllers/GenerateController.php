<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;

class GenerateController extends Controller
{
    public function generate_laporan_hrd()
    {
        $faker = Faker::create('id_ID');
        $divisi_id = 2;

        $laporan_rencana_kerja = $request->laporan_rencana_kerja;
        $laporan_keterangan = $request->laporan_keterangan;
        $laporan_presentasi_pencapaian = $request->laporan_presentasi_pencapaian;
        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        $arrayTanggal =  [
            false,
        ];
        for ($i=0; $i <= $daysInMonth; $i++) {
            $arrayTanggal[$i] = in_array($i, $checkedDays) ? true : false;
        }
        $laporan_jumlah_hari = json_encode($arrayTanggal);
        die;
    }
}
