<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Login;
use App\Models\Divisi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Generate Data Divisi
        $array_divisi = [
            'IT', 'HRD', 'Finance', 'Purchasing', 'Admin Umum', 'Alat Berat', 'Pengawas Tambang', 'Operational', 'Audit'
        ];

        foreach ($array_divisi as $rr) {
            $divisi = new Divisi;
            $divisi_nama = $rr;
            $save_divisi = $divisi->create([
                'divisi_nama' => $divisi_nama,
                'divisi_keterangan' => $divisi_nama,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_divisi->save();
        }
    }
}
