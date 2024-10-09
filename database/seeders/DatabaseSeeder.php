<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Divisi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Inisialisasi Data Faker
        $faker = Faker::create('id_ID');

        // =================================================================================================
        // =================================================================================================

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

        // =================================================================================================
        // =================================================================================================

        // Get Data Divisi
        $divisi_get = Divisi::all();
        $cari_divisi = $divisi_get->where('divisi_nama', 'IT')->first();

        // Generate Data Fathur
        $token = Str::random(16);
        $role = "admin";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'FathurWalkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // =================================================================================================

        // Get Data Divisi
        $cari_divisi = $divisi_get->where('divisi_nama', 'IT')->first();

        // Generate Data Fathur
        $token = Str::random(16);
        $role = "admin";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'admin@ecoasphalt.com',
            'login_telepon' => '08339393939',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // =================================================================================================

        // Get Data Divisi
        $cari_divisi = $divisi_get->where('divisi_nama', 'IT')->first();

        // Generate Data Wahyu
        $token = Str::random(16);
        $role = "admin";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('9090', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Wahyu Nur Susilo',
            'login_username' => 'wahyu',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'wahyuns@ecoasphalt.com',
            'login_telepon' => '08339393939',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // =================================================================================================
        // Get Data Divisi
        $cari_divisi = $divisi_get->where('divisi_nama', 'HRD')->first();

        // Generate Data Wahyu
        $token = Str::random(16);
        $role = "admin";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('hrd', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'HRD Test',
            'login_username' => 'hrdtest',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'hrdtest@ecoasphalt.com',
            'login_telepon' => '08339393939',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
