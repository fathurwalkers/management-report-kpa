<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use Illuminate\Support\Carbon;

class FilingController extends Controller
{
    public function index()
    {
        return view('filing.index');
    }
}
