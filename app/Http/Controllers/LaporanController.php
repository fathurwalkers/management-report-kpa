<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use App\Models\Folder;
use App\Models\File;
use App\Models\Area;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanController extends Controller
{
    public function index($divisi_nama)
    {
        $area = Area::all();
        $users = session('data_login');
        if ($users->divisi_id == 2) {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } elseif ($users->divisi->id == 26 || $users->login_jabatan == "Head Office" || $users->login_jabatan == "Staff Kantor Pusat") {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } elseif ($users->login_level == 'pj' && $users->divisi->id !== 26) {
            $get_divisi = Divisi::where('divisi_nama', $divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } else {
            $get_divisi = Divisi::where('id', $users->divisi_id)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        }

        $laporan_tambahan = Laporan::where(function($query) use ($users) {
            $query->where('laporan_tujuan', $users->id)
                  ->orWhere('login_id', $users->id)
                  ->where('laporan_tujuan', '!==', NULL);
        })->distinct()->get();
        $laporan = $laporan->merge($laporan_tambahan);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $laporanSubset = $laporan->slice($offset, $perPage);
        $laporan = new LengthAwarePaginator(
            $laporanSubset,
            $laporan->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
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
        $logins = Login::all();
        return view('dashboard.laporan.index', [
            'laporan' => $laporan,
            'logins' => $logins,
            'users' => $users,
            'divisi' => $get_divisi,
            'divisi_nama' => $get_divisi->divisi_nama,
            'jumlah_hari' => $daysInMonth,
            'dates' => $dates,
            'year' => $currentYear,
            'month' => $currentMonth,
            'reportCounts' => $reportCounts,
            'periode_sekarang' => $periode_sekarang,
            'area' => $area,
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
        if ($laporan->laporan_presentasi_pencapaian !== 100) {
            return redirect()->route('laporan', $divisi_nama)->with('status', 'Presentasi Laporan yang tidak sampai 100% tidak dapat disetujui, karena belum selesainya rencana kerja!');
        } else {
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
        $laporan_tujuan_request = $request->laporan_tujuan;
        if ($laporan_tujuan_request == null) {
            $laporan_tujuan = null;
        } else {
            $convert_int_laporan_tujuan = intval($laporan_tujuan_request);
            $laporan_tujuan_query = Login::find($convert_int_laporan_tujuan);
            $laporan_tujuan_hasil = $laporan_tujuan_query->id;
            $laporan_tujuan = $laporan_tujuan_hasil;
        }
        $areakerjaquery = Area::where('areakerja_lokasi', $request->areakerja)->first();
        if ($areakerjaquery !== null) {
            $areakerja = $areakerjaquery->id;
        } else {
            $areakerja = null;
        }
        $users = session('data_login');
        $before_created_at_tanggal = $request->created_at_tanggal;
        $before_created_at_waktu = $request->created_at_waktu;
        if($before_created_at_waktu === null) {
            $before_created_at_waktu = "00:01";
            $created_at = Carbon::createFromFormat('Y-m-d H:i', $before_created_at_tanggal . ' ' . $before_created_at_waktu);
        } else {
            $created_at = Carbon::createFromFormat('Y-m-d H:i', $before_created_at_tanggal . ' ' . $before_created_at_waktu);
        }
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
            'laporan_rencana_kerja' => $laporan_rencana_kerja,
            'laporan_jumlah_hari' => $laporan_jumlah_hari,
            'laporan_presentasi_pencapaian' => $laporan_presentasi_pencapaian,
            'laporan_keterangan' => $laporan_keterangan,
            'laporan_status' => $laporan_status,
            'laporan_file' => null,
            'area_id' => $areakerja,
            'laporan_tujuan' => $laporan_tujuan,
            'divisi_id' => $users->divisi_id,
            'login_id' => $users->id,
            'periode_id' => $periode->id,
            'created_at' => $created_at,
            'updated_at' => now()
        ]);

        $laporan_id_baru = $save_laporan->id;
        $laporan_file = $request->laporan_file;
        $divisi_id = $users->divisi->id;
        $login_id = $users->id;

        if ($laporan_file !== null) {
            foreach ($laporan_file as $files) {
                $ext_file = $files->getClientOriginalExtension();
                $array_dokumen = ["pdf", "doc", "docs", "xls", "xlsx"];
                $array_gambar = ["png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp"];
                if (in_array($ext_file, $array_dokumen)) {
                    $file_jenis = "Dokumen";
                } elseif (in_array($ext_file, $array_gambar)) {
                    $file_jenis = "Gambar";
                } else {
                    return redirect()->route('laporan', [$users->divisi->divisi_nama])
                        ->with('status', 'Maaf, file Dokumen yang anda input tidak memenuhi syarat / tidak sesuai.');
                }
                $nama_file_baru = "FILES-" . $users->divisi->divisi_nama . "-" . $users->divisi->id . "-" . $files->getClientOriginalName() . "-KPA." . $ext_file;
                $directory = $file_jenis . '/' . $users->divisi->divisi_nama;
                $path = $files->storeAs($directory, $nama_file_baru, 'public');
                $folder = Folder::where('divisi_id', $divisi_id)->first();
                $file_new = new File;
                $save_file_new = $file_new->create([
                    'file_nama' => $nama_file_baru,
                    'file_extensi' => $ext_file,
                    'file_kode' => "FILES-" . $folder->folder_kode,
                    'file_jenis' => $file_jenis,
                    'file_path' => $path,
                    'laporan_id' => $laporan_id_baru,
                    'folder_id' => $folder->id,
                    'login_id' => $login_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        $save_laporan->save();
        return redirect()->route('laporan', [$users->divisi->divisi_nama])->with('status', 'Berhasil membuat data laporan!');
    }

    public function edit_laporan_view(Request $request, $id_laporan)
    {
        $area = Area::all();
        $users = session('data_login');
        if ($users->divisi_id == 2) {
            $get_divisi = Divisi::where('divisi_nama', $users->divisi->divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } elseif ($users->divisi->id == 26 || $users->login_jabatan == "Head Office" || $users->login_jabatan == "Staff Kantor Pusat") {
            $get_divisi = Divisi::where('divisi_nama', $users->divisi->divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } elseif ($users->login_level == 'pj' && $users->divisi->id !== 26) {
            $get_divisi = Divisi::where('divisi_nama', $users->divisi->divisi_nama)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        } else {
            $get_divisi = Divisi::where('id', $users->divisi_id)->first();
            $laporan = Laporan::where('divisi_id', $get_divisi->id)->get();
        }
        $laporan = Laporan::find($id_laporan);
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
        $logins = Login::all();
        return view('dashboard.laporan.edit-laporan', [
            'laporan' => $laporan,
            'logins' => $logins,
            'users' => $users,
            'divisi' => $get_divisi,
            'divisi_nama' => $get_divisi->divisi_nama,
            'jumlah_hari' => $daysInMonth,
            'dates' => $dates,
            'year' => $currentYear,
            'month' => $currentMonth,
            'reportCounts' => $reportCounts,
            'periode_sekarang' => $periode_sekarang,
            'area' => $area,
        ]);
    }

    public function edit_laporan(Request $request)
    {
        $areakerjaquery = Area::where('areakerja_lokasi', $request->areakerja)->first();
        if ($areakerjaquery !== null) {
            $areakerja = $areakerjaquery->id;
        } else {
            $areakerja = null;
        }
        $before_created_at_tanggal = $request->created_at_tanggal;
        $before_created_at_waktu = $request->created_at_waktu;
        if($before_created_at_waktu === null) {
            $before_created_at_waktu = "00:01";
            $created_at = Carbon::createFromFormat('Y-m-d H:i', $before_created_at_tanggal . ' ' . $before_created_at_waktu);
        } else {
            $created_at = Carbon::createFromFormat('Y-m-d H:i', $before_created_at_tanggal . ' ' . $before_created_at_waktu);
        }
        $divisi_nama = $request->divisi_nama;
        $laporan_id = $request->laporan_id;
        $laporan = Laporan::find($laporan_id);
        $users = session('data_login');
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
            $laporan_jumlah_hari = $laporan->laporan_jumlah_hari;
        }
        $laporan_jumlah_hari = json_encode($arrayTanggal);
        $explodetanggal = explode("-",$request->created_at_tanggal);
        $tahun = $explodetanggal[0];
        $bulan = $explodetanggal[1];
        $bulanint = intval($created_at->month);
        switch($tahun) {
            case "2024":
                $bulanint;
                break;
            case "2025":
                $bulanint += 12;
                break;
        }
        $laporan->update([
            'laporan_rencana_kerja' => $laporan_rencana_kerja,
            'laporan_jumlah_hari' => $laporan_jumlah_hari,
            'laporan_presentasi_pencapaian' => $laporan_presentasi_pencapaian,
            'laporan_keterangan' => $laporan_keterangan,
            'periode_id' => $bulanint,
            'created_at' => $created_at,
            'updated_at' => now()
        ]);
        return redirect()->route('laporan', [$divisi_nama])->with('status', 'Berhasil mengubah data laporan!');
    }

    public function print_laporan(Request $request)
    {
        $users = session('data_login');
        $get_divisi = Divisi::where('divisi_nama', $request->divisi_nama)->first();
        $selectedMonth = $request->bulan;
        $intbulan = intval($request->bulan);
        if ($selectedMonth >= 13 && $selectedMonth <= 24) {
            $selectedMonth = ($selectedMonth - 1) % 12 + 1;
        }
        if ($request->bulan >= 13) {
            $currentYear = "2025";
        } else {
            $currentYear = "2024";
        }
        $periode = Periode::where('id', $intbulan)->first();
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
            'selectedmonth' => $selectedMonth,
            'currentyear' => $currentYear,
        ]);
    }
}
