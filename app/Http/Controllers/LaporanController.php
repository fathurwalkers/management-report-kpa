<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;

class LaporanController extends Controller
{
    public function index($divisi)
    {
        $divisi_nama = $divisi;
        $get_divisi = Divisi::where('divisi_nama', $divisi)->get();
        return view('dashboard.laporan.index', [
            'divisi' => $get_divisi,
            'divisi_nama' => $divisi_nama,
        ]);
    }
}
