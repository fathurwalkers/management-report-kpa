<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use App\Models\Area;

class GenerateController extends Controller
{
    public function generate_area()
    {
        $array_area = [
            'Crusher Baru',
            'Crusher Lama to Mixer',
            'J2 Tank',
            'Thickener',
            'Vaccum Filter',
            'V-20109A dan Desalter',
            'Tanki 6',
            'Tanki 7',
            'Distilasi',
            'Packing',
            'Lab',
            'Boiler',
            'WTP',
            'RO Pabrik',
            'Genset',
            'Electric',
            'Gudang',
            'Gudang Gas',
            'Workshop',
            'Stockpile',
            '304',
            '305',
            'Mixer',
        ];

        foreach ($array_area as $areas) {
            $area = new Area;
            $save_area = $area->create([
                'areakerja_lokasi' => $areas,
                'areakerja_kode' => $areas,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_area->save();
        }
    }
}
