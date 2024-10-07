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
        $dept = Divisi::all();
        return view('components.dashboard-navbar', [
            'dept' => $dept
        ]);
    }
}
