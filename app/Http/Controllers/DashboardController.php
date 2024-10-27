<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        $month = date('n');
        $year = date('Y');
        $periode = Periode::where('periode_bulan_int', $month)
            ->where('periode_tahun', $year)
            ->first();
        if ($periode) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        } else {
            $daysInMonth = 0;
        }
        $reports = DB::table('laporan')
            ->select(DB::raw('DATE(created_at) as report_date'), DB::raw('count(*) as total'))
            ->where('divisi_id', $users->divisi_id)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('report_date')
            ->get();
        $dates = [];
        $reportCounts = [];
        foreach ($reports as $report) {
            $dates[] = Carbon::parse($report->report_date)->format('d M');
            $reportCounts[] = $report->total;
        }
        $periode_sekarang = $this->getBulanIndonesia(intval($month));
        $divisi = Divisi::all()->count();
        $laporan = Laporan::all()->count();
        $login = Login::all()->count();

        return view('dashboard.index', [
            'divisi' => $divisi,
            'laporan' => $laporan,
            'login' => $login,
            'month' => $month,
            'year' => $year,
            'dates' => $dates,
            'reportCounts' => $reportCounts,
            'periode_sekarang' => $periode_sekarang,
        ]);
    }

    public function index_divisi($divisi_nama)
    {
        $divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
        $users = session('data_login');
        $login = Login::where('divisi_id', $divisi->id)->get();
        return view('dashboard.divisi.index', [
            'users' => $users,
            'login' => $login,
            'divisi' => $divisi,
        ]);
    }

    public static function getBulanIndonesia($month)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        return $bulan[$month];
    }
}
