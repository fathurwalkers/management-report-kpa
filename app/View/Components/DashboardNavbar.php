<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Divisi;

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
        $dept = $divisi_all->where('id', $users->divisi_id)->first();
        return view('components.dashboard-navbar', [
            'dept' => $dept,
            'users' => $users,
        ]);
    }
}
