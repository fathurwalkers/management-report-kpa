<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;

class LaporanController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        $get_divisi = Divisi::where('id', $users->divisi_id)->first();
        return view('dashboard.laporan.index', [
            'divisi' => $get_divisi,
            'divisi_nama' => $get_divisi->divisi_nama,
        ]);
    }

    public function proses_laporan(Request $request)
    {
        die;
    }

    public function print_laporan()
    {
        return view('dashboard.laporan.print-laporan');
    }
}
