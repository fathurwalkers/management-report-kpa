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
        $reports = DB::table('laporan')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
            ->where('divisi_id', $users->divisi_id)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $reportCounts = array_fill(1, 12, 0);
        $months = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        foreach ($reports as $report) {
            $reportCounts[$report->month] = $report->total;
        }
        $divisi = Divisi::all()->count();
        $laporan = Laporan::all()->count();
        $login = Login::all()->count();
        return view('dashboard.index', [
            'divisi' => $divisi,
            'laporan' => $laporan,
            'login' => $login,
            'month' => $month,
            'year' => $year,
            'reportCounts' => $reportCounts,
            'months' => $months,
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

    public function buat_user()
    {
        $users = session('data_login');
        if ($users->divisi_id == 2 || $users->divisi_id == 1) {
            return view('dashboard.buat-user');
        } else {
            return redirect()->route('home')->with('status', 'Maaf, anda tidak punya otoritas untuk mengakses halaman ini. ');
        }
    }

    public function proses_buat_user(Request $request)
    {
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);

        $login_username = "KPA" . $request->login_username;
        $login_password = $hashPassword;
        $login_token = $hashToken;
        $login_no_karyawan = $login_username;
        $login_email = $request->login_email;
        $login_no_telepon = $request->login_no_telepon;
        $login_level = $request->login_level;
        $login_jabatan = $request->login_jabatan;
        $login_status = "verified";

    }
}
