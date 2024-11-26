<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Divisi;
use App\Models\Login;

class DashboardNavbar extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $divisi_all = Divisi::all();
        $users = session('data_login');
        // dd($users->login_jabatan);
        switch ($users->login_jabatan) {
            case 'Staff Kantor Pusat':
                $typing = 'A';
                $divisinew = $divisi_all;
                break;
            case 'Head Office':
                $typing = 'A';
                $divisinew = $divisi_all;
                break;
            case 'Human Capital & GA':
                $typing = 'A';
                $array_divisi = [1, 2, 17, 18, 19, 20];
                $divisinew = Divisi::whereIn('id', $array_divisi)->get();
                break;
            case 'Manajer HRD':
                $typing = 'A';
                $array_divisi = [1, 2, 17, 18, 19, 20];
                $divisinew = Divisi::whereIn('id', $array_divisi)->get();
                break;
            case 'PJ Gudang & Admin':
                $typing = 'A';
                $array_divisi = [3, 4, 6, 7, 8, 21, 22, 23, 24];
                $divisinew = Divisi::whereIn('id', $array_divisi)->get();
                break;
            case 'Manager Pabrik':
                $typing = 'A';
                $array_divisi = [10, 12, 13, 14, 15, 16, 25];
                $divisinew = Divisi::whereIn('id', $array_divisi)->get();
                break;
            default:
                $typing = 'B';
                $divisi_id = $users->divisi_id;
                if ($users->divisi_id == 2) {
                    $divisinew = $divisi_all;
                } else {
                    $divisinew = Divisi::where('id', $divisi_id)->first();
                }
                break;
        }
        $dd = $divisi_all->where('id', $users->divisi_id)->first();
        return view('components.dashboard-navbar', [
            'dept' => $divisinew,
            'dd' => $dd,
            'users' => $users,
            'typing' => $typing,
        ]);
    }
}
