<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;

class DashboardController extends Controller
{
    public function index()
    {
        $divisi = Divisi::all()->count();
        $laporan = Laporan::all()->count();
        $login = Login::all()->count();
        return view('dashboard.index', [
            'divisi' => $divisi,
            'laporan' => $laporan,
            'login' => $login,
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
}
