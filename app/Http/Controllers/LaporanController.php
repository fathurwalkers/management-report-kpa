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
        $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        if ($periode) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        } else {
            $daysInMonth = 0;
        }
        return view('dashboard.laporan.index', [
            'laporan' => $laporan,
            'users' => $users,
            'divisi' => $get_divisi,
            'divisi_nama' => $get_divisi->divisi_nama,
            'jumlah_hari' => $daysInMonth
        ]);
    }

    public function hapus_laporan(Request $request, $laporan_id)
    {
        $laporan = Laporan::where('id', $laporan_id)->first();
        dd($laporan);
    }

    public function get_laporan()
    {
        $users = session('data_login');
        $get_divisi = Divisi::where('id', $users->divisi_id)->first();
        $laporan = Laporan::with(['divisi', 'login'])->where('divisi_id', $get_divisi->id)->get();
        return response()->json($laporan);
    }

    public function proses_laporan(Request $request)
    {
        $users = session('data_login');
        $checkedDays = $request->laporan_jumlah_hari;
        $laporan_rencana_kerja = $request->laporan_rencana_kerja;
        $laporan_keterangan = $request->laporan_keterangan;
        $laporan_presentasi_pencapaian = $request->laporan_presentasi_pencapaian;

        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);

        $arrayTanggal =  [];

        for ($i=0; $i < $daysInMonth; $i++) {
            $arrayTanggal[$i] = in_array($i, $checkedDays) ? true : false;
        }
        $laporan_jumlah_hari = json_encode($arrayTanggal);

        $laporan = new Laporan;
        $save_laporan = $laporan->create([
            'laporan_rencana_kerja' => $laporan_rencana_kerja,
            'laporan_jumlah_hari' => $laporan_jumlah_hari,
            'laporan_presentasi_pencapaian' => $laporan_presentasi_pencapaian,
            'laporan_keterangan' => $laporan_keterangan,
            'divisi_id' => $users->divisi_id,
            'login_id' => $users->id,
            'periode_id' => $periode->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('laporan')->with('status', 'Berhasil membuat data laporan!');
    }

    public function print_laporan(Request $request)
    {
        $users = session('data_login');
        $get_divisi = Divisi::where('id', $users->divisi_id)->first();

        $currentMonth = date('n');
        $currentYear = date('Y');

        $currentMonth = intval($currentMonth);
        $currentYear = intval($currentYear);

        $periode = Periode::where('id', $currentMonth)->where('periode_tahun', $currentYear)->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $laporan = Laporan::where('divisi_id', $get_divisi->id)
                 ->where('periode_id', $periode ? $periode->id : null)
                 ->get();
        // dd([
        //     $daysInMonth,
        //     $laporan,
        //     $periode,
        // ]);

        return view('dashboard.laporan.print-laporan', [
            'users' => $users,
            'divisi' => $get_divisi,
            'laporan' => $laporan,
            'days' => $daysInMonth
        ]);
    }
}
