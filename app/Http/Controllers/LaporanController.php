<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index($divisi_nama)
    {
        $users = session('data_login');
        if ($users->divisi_id == 2) {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)
                ->get();
        } elseif ($users->divisi_id == 26) {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)
                ->where('laporan_status', 'SETUJU')
                ->get();
        } elseif ($users->login_level == 'pj') {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)
                ->get();
        } else {
            $get_divisi = Divisi::where('id', $users->divisi_id)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        }
        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        if ($periode) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        } else {
            $daysInMonth = 0;
        }
        $reports = DB::table('laporan')
            ->select(DB::raw('DATE(created_at) as report_date'), DB::raw('count(*) as total'))
            ->where('divisi_id', $get_divisi->id)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->groupBy('report_date')
            ->get();
        $dates = [];
        $reportCounts = [];
        foreach ($reports as $report) {
            $dates[] = Carbon::parse($report->report_date)->format('d M');
            $reportCounts[] = $report->total;
        }
        $periode_sekarang = DashboardController::getBulanIndonesia(intval($currentMonth));
        return view('dashboard.laporan.index', [
            'laporan' => $laporan,
            'users' => $users,
            'divisi' => $get_divisi,
            'divisi_nama' => $get_divisi->divisi_nama,
            'jumlah_hari' => $daysInMonth,
            'dates' => $dates,
            'year' => $currentYear,
            'month' => $currentMonth,
            'reportCounts' => $reportCounts,
            'periode_sekarang' => $periode_sekarang,
        ]);
    }

    public function hapus_laporan(Request $request)
    {
        $divisi_nama = $request->divisi_nama;
        $hapus_id = $request->input('hapus_id');
        $laporan = Laporan::find($hapus_id);
        if ($laporan) {
            $laporan->delete();
            return redirect()->route('laporan', $divisi_nama)->with('status', 'Berhasil Menghapus Data Laporan!');
        } else {
            return redirect()->route('laporan', $divisi_nama)->with('status', 'Gagal Menghapus Data Laporan!');
        }
    }

    public function konfirmasi_laporan(Request $request)
    {
        $laporan_id = $request->input('laporan_id');
        $divisi_nama = $request->input('divisi_nama');
        $laporan = Laporan::find($laporan_id);
        if ($laporan) {
            $laporan->update([
                'laporan_status' => "SETUJU",
                'updated_at' => now()
            ]);
            return redirect()->route('laporan', $divisi_nama)->with('status', 'Berhasil konfirmasi Data Laporan!');
        } else {
            return redirect()->route('laporan')->with('status', 'Gagal konfirmasi Data Laporan!');
        }
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
        $before_created_at = $request->created_at;
        $created_at = Carbon::createFromFormat('Y-m-d', $before_created_at);
        $checkedDays = $request->laporan_jumlah_hari;
        $laporan_rencana_kerja = $request->laporan_rencana_kerja;
        $laporan_keterangan = $request->laporan_keterangan;
        $laporan_presentasi_pencapaian = $request->laporan_presentasi_pencapaian;
        $laporan_status = "PENDING";
        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        $arrayTanggal = [
            false,
        ];
        if ($checkedDays !== null) {
            for ($i = 0; $i <= $daysInMonth; $i++) {
                $arrayTanggal[$i] = in_array($i, $checkedDays) ? true : false;
            }
            $laporan_jumlah_hari = json_encode($arrayTanggal);
        } else {
            $checkedDays = null;
            $laporan_jumlah_hari = null;
        }
        $laporan = new Laporan;
        $save_laporan = $laporan->create([
            'laporan_rencana_kerja' => htmlspecialchars($laporan_rencana_kerja),
            'laporan_jumlah_hari' => $laporan_jumlah_hari,
            'laporan_presentasi_pencapaian' => $laporan_presentasi_pencapaian,
            'laporan_keterangan' => $laporan_keterangan,
            'laporan_status' => $laporan_status,
            'divisi_id' => $users->divisi_id,
            'login_id' => $users->id,
            'periode_id' => $created_at->month,
            'created_at' => $created_at,
            'updated_at' => now()
        ]);
        $save_laporan->save();
        return redirect()->route('laporan', [$users->divisi->divisi_nama])->with('status', 'Berhasil membuat data laporan!');
    }

    public function edit_laporan(Request $request)
    {
        $divisi_nama = $request->divisi_nama;
        $laporan_id = $request->laporan_id;
        $users = session('data_login');
        $before_created_at = $request->created_at;
        $created_at = Carbon::createFromFormat('Y-m-d', $before_created_at);
        $checkedDays = $request->laporan_jumlah_hari;
        $laporan_rencana_kerja = $request->laporan_rencana_kerja;
        $laporan_keterangan = $request->laporan_keterangan;
        $laporan_presentasi_pencapaian = $request->laporan_presentasi_pencapaian;
        $currentMonth = date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', $currentMonth)->where('periode_tahun', $currentYear)->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $periode->periode_bulan_int, $periode->periode_tahun);
        $arrayTanggal = [
            false,
        ];
        if ($checkedDays !== null) {
            for ($i = 0; $i <= $daysInMonth; $i++) {
                $arrayTanggal[$i] = in_array($i, $checkedDays) ? true : false;
            }
            $laporan_jumlah_hari = json_encode($arrayTanggal);
        } else {
            $checkedDays = null;
            $laporan_jumlah_hari = null;
        }
        $laporan_jumlah_hari = json_encode($arrayTanggal);
        $laporan = Laporan::find($laporan_id);
        $laporan->update([
            'laporan_rencana_kerja' => $laporan_rencana_kerja,
            'laporan_jumlah_hari' => $laporan_jumlah_hari,
            'laporan_presentasi_pencapaian' => $laporan_presentasi_pencapaian,
            'laporan_keterangan' => $laporan_keterangan,
            'periode_id' => $created_at->month,
            'created_at' => $created_at,
            'updated_at' => now()
        ]);
        return redirect()->route('laporan', [$divisi_nama])->with('status', 'Berhasil mengubah data laporan!');
    }

    public function print_laporan(Request $request)
    {
        $users = session('data_login');
        $get_divisi = Divisi::where('divisi_nama', $request->divisi_nama)->first();
        $selectedMonth = $request->bulan ?? date('n');
        $currentYear = date('Y');
        $periode = Periode::where('periode_bulan_int', intval($selectedMonth))
            ->where('periode_tahun', $currentYear)
            ->first();
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, intval($selectedMonth), $currentYear);
        if ($users->divisi->id == 26) {
            $laporan = Laporan::where('divisi_id', $get_divisi->id)
                ->where('periode_id', $periode ? $periode->id : null)
                ->where('laporan_status', 'SETUJU')
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $laporan = Laporan::where('divisi_id', $get_divisi->id)
                ->where('periode_id', $periode ? $periode->id : null)
                ->orderBy('created_at', 'asc')
                ->get();
        }
        return view('dashboard.laporan.print-laporan', [
            'users' => $users,
            'divisi' => $get_divisi,
            'laporan' => $laporan,
            'days' => $daysInMonth,
            'periode' => $periode,
        ]);
    }
}
