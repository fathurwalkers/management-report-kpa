<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
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
        $divisi = Divisi::all();
        if ($users->divisi_id == 2 || $users->divisi_id == 1) {
            return view('dashboard.buat-user', [
                'divisi' => $divisi
            ]);
        } else {
            return redirect()->route('home')->with('status', 'Maaf, anda tidak punya otoritas untuk mengakses halaman ini. ');
        }
    }

    public function proses_buat_user(Request $request)
    {
        $token = Str::random(16);
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        $divisi_id = intval($request->divisi_id);
        $divisi = Divisi::find($divisi_id);
        // dd($divisi);

        $login_nama = $request->login_nama;
        $login_username = "KPA" . $request->login_username;
        $login_password = $hashPassword;
        $login_token = $hashToken;
        $login_no_karyawan = $login_username;
        $login_email = $request->login_email;
        $login_no_telepon = $request->login_no_telepon;
        $login_level = $request->login_level;
        $login_jabatan = $request->login_jabatan;
        $login_status = "verified";

        $login = new Login;
        $save_login = $login->create([
                'login_nama' => $login_nama,
                'login_username' => $login_username,
                'login_password' => $login_password,
                'login_no_karyawan' => $login_no_karyawan,
                'login_email' => $login_email,
                'login_telepon' => $login_no_telepon,
                'login_token' => $login_token,
                'login_level' => $login_level,
                'login_jabatan' => $login_jabatan,
                'login_status' => "verified",
                'divisi_id' => $divisi->id,
                'created_at' => now(),
                'updated_at' => now()
        ]);
        $save_login->save();
        if ($save_login) {
            return redirect()->route('buat-user')->with('status', 'User telah berhasil dibuat!');
        } else {
            return redirect()->route('buat-user')->with('status', 'Ada kesalahan saat membuat user, user tidak dapat dibuat!');
        }

    }
}
