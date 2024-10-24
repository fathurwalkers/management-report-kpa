<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Divisi;
use App\Models\Periode;
use App\Models\Laporan;

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
            'IT',
            'HRD',
            'Finance',
            'Purchasing',
            'Administrative',
            'Alat Berat',
            'Tambang',
            'Operational',
            'Audit',
            'Produksi',
            'Audit',
            'WTP',
            'Boiler',
            'Electric',
            'Mechanic',
            'Pabrikasi',
            'HSE',
            'Housekeeping',
            'Maintenance Office',
            'Security',
            'Warehouse',
            'Sipil',
            'Logistik',
            'Translator',
            'Labolatory',
            'Head Office - Jakarta',
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
        // Generate Data Periode
        $tahun_periode = "2024";
        $array_bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $iter = 1;

        foreach ($array_bulan as $rr) {
            $periode = new Periode;
            $save_divisi = $periode->create([
                'periode_bulan_int' => $iter++,
                'periode_tahun' => $tahun_periode,
                'periode_bulan' => $rr,
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
            'login_jabatan' => "Supervisor",
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
            'login_jabatan' => "Manager IT",
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
            'login_jabatan' => "Manager IT",
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
        $hashPassword = Hash::make('hrdtest', [
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
            'login_jabatan' => "Supervisor",
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // =================================================================================================
        // Get Data Divisi
        $cari_divisi = $divisi_get->where('divisi_nama', 'HRD')->first();

        // Generate Data Kepala HRD
        $token = Str::random(16);
        $role = "pj";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('pjhrd', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'PJHRD',
            'login_username' => 'pjhrd',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'pjhrd@ecoasphalt.com',
            'login_telepon' => '08339393939',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_jabatan' => "Manajer HRD",
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // =================================================================================================
        // Get Data Divisi
        $cari_divisi = $divisi_get->find(26);

        // Generate Data Kepala HRD
        $token = Str::random(16);
        $role = "ho";
        $login_no_karyawan = 00700;
        $hashPassword = Hash::make('kantorpusat', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Kantor Pusat Jakarta',
            'login_username' => 'kantorpusat',
            'login_password' => $hashPassword,
            'login_no_karyawan' => $login_no_karyawan,
            'login_email' => 'kantorpusat@ecoasphalt.com',
            'login_telepon' => '08339393939',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_jabatan' => "Staff Kantor Pusat",
            'login_status' => "verified",
            'divisi_id' => $cari_divisi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // =================================================================================================
        // =================================================================================================


        $employees = [
            ["Nama" => "Sudarman", "Div" => "Manager Pabrik", "Nik/ID" => "KPA00128", "Jabatan" => 10],
            ["Nama" => "Ujang Jaenudin", "Div" => "Super Attedant I", "Nik/ID" => "KPA00153", "Jabatan" => 10],
            ["Nama" => "Anang Nugroho", "Div" => "SPV Daily", "Nik/ID" => "KPA00132", "Jabatan" => 10],
            ["Nama" => "Akhmad Maftukhin", "Div" => "SPV Grub A", "Nik/ID" => "KPA00154", "Jabatan" => 10],
            ["Nama" => "Muh.Habib Muhanny", "Div" => "SPV Grub B", "Nik/ID" => "KPA00165", "Jabatan" => 10],
            ["Nama" => "Tan Ayong", "Div" => "SPV Grub C", "Nik/ID" => "KPA00358", "Jabatan" => 10],
            ["Nama" => "Vacancy", "Div" => "Super Attedant II", "Nik/ID" => "KPA99999", "Jabatan" => 10],
            ["Nama" => "Hikmayani", "Div" => "Head Laboratory", "Nik/ID" => "KPA01122", "Jabatan" => 25],
            ["Nama" => "Fajarudin", "Div" => "Leader Grub A", "Nik/ID" => "KPA00077", "Jabatan" => 25],
            ["Nama" => "Lm.Raif Alfaizhar F.", "Div" => "Leader Grub B", "Nik/ID" => "KPA00185", "Jabatan" => 25],
            ["Nama" => "Agung Atmajaya", "Div" => "Leader Grub C", "Nik/ID" => "KPA00227", "Jabatan" => 25],
            ["Nama" => "Haryudi", "Div" => "Head Utillity", "Nik/ID" => "KPA00213", "Jabatan" => 12],
            ["Nama" => "Michael Doni T.H", "Div" => "Head Boiler", "Nik/ID" => "KPA00022", "Jabatan" => 13],
            ["Nama" => "La Tondi", "Div" => "Leader Grub A", "Nik/ID" => "KPA00157", "Jabatan" => 13],
            ["Nama" => "La Dino", "Div" => "Leader Grub B", "Nik/ID" => "KPA00166", "Jabatan" => 13],
            ["Nama" => "Agus Fatmanto", "Div" => "Leader Grub C", "Nik/ID" => "KPA00203", "Jabatan" => 13],
            ["Nama" => "Fahrosiudin", "Div" => "Leader Grub D", "Nik/ID" => "KPA00342", "Jabatan" => 13],
            ["Nama" => "Rukman", "Div" => "Head Electic & Instrument", "Nik/ID" => "KPA00125", "Jabatan" => 14],
            ["Nama" => "Frans Denny Manurung", "Div" => "Head Mekanik & Pabrikasi", "Nik/ID" => "KPA00023", "Jabatan" => 15],
            ["Nama" => "Suminta", "Div" => "Supervisor Pabrikasi", "Nik/ID" => "KPA00064", "Jabatan" => 16],

            // Data tambahan dari gambar terbaru
            ["Nama" => "Jimmy Khustin Chandra", "Div" => "PJ Gudang & Admin", "Nik/ID" => "KPA00005", "Jabatan" => 8],
            ["Nama" => "Suharni", "Div" => "Admin Umum", "Nik/ID" => "KPA00238", "Jabatan" => 5],
            ["Nama" => "Irma Wati", "Div" => "Finance", "Nik/ID" => "KPA00243", "Jabatan" => 3],
            ["Nama" => "Sarfin Ardi", "Div" => "Quality Control Bahan Baku/Timbangan", "Nik/ID" => "KPA00220", "Jabatan" => 7],
            ["Nama" => "Andri Sepriadi", "Div" => "Head Purchasing", "Nik/ID" => "KPA00054", "Jabatan" => 4],
            ["Nama" => "Basuki", "Div" => "Kepala Gudang", "Nik/ID" => "KPA00012", "Jabatan" => 21],
            ["Nama" => "Tri Hartanto", "Div" => "Kepala Workshop dan Alat Berat", "Nik/ID" => "KPA00053", "Jabatan" => 6],
            ["Nama" => "Rosmawati", "Div" => "Translator", "Nik/ID" => "KPA00322", "Jabatan" => 24],
            ["Nama" => "Erta Hermawan", "Div" => "Arsitek Sipil", "Nik/ID" => "KPA00190", "Jabatan" => 22],
            ["Nama" => "Hendri Ahmad Z.", "Div" => "Logistik", "Nik/ID" => "KPA00388", "Jabatan" => 23],

            // Data tambahan gambar kedua
            ["Nama" => "Andi S.Ginting", "Div" => "Human Capital & GA", "Nik/ID" => "KPA00152", "Jabatan" => 2],
            ["Nama" => "La Ode Amyn Nadjin", "Div" => "HRD", "Nik/ID" => "KPA00007", "Jabatan" => 2],
            ["Nama" => "Sri Titi Wahyu Ningsi", "Div" => "HRD", "Nik/ID" => "KPA00135", "Jabatan" => 2],
            ["Nama" => "Jarot Priyono", "Div" => "Manager HSE", "Nik/ID" => "KPA00126", "Jabatan" => 17],
            ["Nama" => "Trisnawati Rawu", "Div" => "HSE", "Nik/ID" => "KPA00008", "Jabatan" => 17],
            ["Nama" => "Wahyu Nur Susilo", "Div" => "Manager IT", "Nik/ID" => "KPA00122", "Jabatan" => 1],
            ["Nama" => "Muh.Fathurrahman", "Div" => "SPV IT", "Nik/ID" => "KPA00324", "Jabatan" => 1],
            ["Nama" => "Sutrisno", "Div" => "Maintenance Office", "Nik/ID" => "KPA00017", "Jabatan" => 19],
            ["Nama" => "Yuli Supamrih", "Div" => "Head Housekeeping", "Nik/ID" => "KPA00025", "Jabatan" => 18],
            ["Nama" => "Buntoro", "Div" => "Head Security", "Nik/ID" => "KPA00034", "Jabatan" => 20],
        ];

        foreach ($employees as $insert) {
            $cari_divisi = $divisi_get->where('id', $insert["Jabatan"])->first();
            $div = $insert['Div'];
            if (in_array($div,
            ["Human Capital & GA",
            "PJ Gudang & Admin",
            "Manager Pabrik",
            "Arsitek Sipil",
            "Head Mekanik & Pabrikasi",
            "Kepala Gudang",
            "Kepala Workshop dan Alat Berat",
            "Head Electic & Instrument",
            "Head Purchasing",
            "Head Laboratory",
            "Head Utillity",
            "Head Housekeeping",
            "Head Security",
            "Manager IT",
            "Manager HSE",
            "Maintenance Office",]
            )) {
                $role = 'pj';
            } else {
                $role = 'sp';
            }
            $token = Str::random(16);
            $login_no_karyawan = $insert["Nik/ID"];
            $hashPassword = Hash::make('12345', [
                'rounds' => 12,
            ]);
            $hashToken = Hash::make($token, [
                'rounds' => 12,
            ]);
            Login::create([
                'login_nama' => $insert["Nama"],
                'login_username' => $login_no_karyawan,
                'login_password' => $hashPassword,
                'login_no_karyawan' => $login_no_karyawan,
                'login_email' => null,
                'login_telepon' => null,
                'login_token' => $hashToken,
                'login_level' => $role,
                'login_jabatan' => $insert["Div"],
                'login_status' => "verified",
                'divisi_id' => intval($insert["Jabatan"]),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // =================================================================================================
        // =================================================================================================
        DB::insert("
            INSERT INTO `laporan` (`id`, `laporan_rencana_kerja`, `laporan_jumlah_hari`, `laporan_presentasi_pencapaian`, `laporan_keterangan`, `divisi_id`, `login_id`, `periode_id`, `created_at`, `updated_at`) VALUES
            (1, 'Penginputan Jadwal Kerja Bulan September 2024', '\"[false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-01 05:02:33', '2024-10-13 05:02:33'),
            (2, 'Pencocokan Daftar makan Kantin (Antara Housekeeping dengan HRD)', '\"[false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 100, 'rutin setiap hari', 2, 4, 10, '2024-10-02 05:03:32', '2024-10-13 05:03:32'),
            (3, 'banyak peserta yang tidak aktif', '\"[false,false,true,true,true,true,true,false,false,true,true,true,true,true,false,false,false,true,true,true,true,true,false,true,true,true,true,true,false,false,true,true]\"', 50, 'Pelatihan kursus komputer', 2, 4, 10, '2024-10-03 05:04:57', '2024-10-13 05:04:57'),
            (8, 'Laporan Rutin Awal Bulan :', NULL, NULL, NULL, 2, 4, 10, '2024-10-03 05:22:55', '2024-10-13 05:22:55'),
            (9, '- Upah Helper Geologist periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencaiaran upah', 2, 4, 10, '2024-10-04 05:24:00', '2024-10-13 05:24:00'),
            (10, '- Laporan Tagihan Makan Kantin Daffa periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencairan dana', 2, 4, 10, '2024-10-04 05:24:58', '2024-10-13 05:24:58'),
            (11, '- Laporan absensi dan upah muttaqin periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencaiaran upah', 2, 4, 10, '2024-10-05 05:25:59', '2024-10-13 05:25:59'),
            (12, '- Laporan data TKI Harian Bulan Agustus 2024', '\"[false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-05 17:00:00', '2024-10-13 05:26:36'),
            (13, 'Laporan insentif dan lembur bulan Agustus 2024', '\"[false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 12:48:13', '2024-10-13 05:27:33'),
            (14, 'Laporan Invoice BPJS Ketenagakerjaan dan Kesehatan September 2024', '\"[false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:28:53', '2024-10-13 05:28:53'),
            (15, 'Laporan Insentif PKL Bulan Agustus 2024', '\"[false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:29:34', '2024-10-13 05:29:34'),
            (16, 'Pendaftaran BPJS Kesehatan', '\"[false,false,false,false,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', NULL, NULL, 2, 4, 10, '2024-10-07 05:31:03', '2024-10-13 05:31:03'),
            (17, 'Tan Ayong', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 70, 'anak berusia 21 Tahun harus dipisahkan dari tanggungan orang tua', 2, 4, 10, '2024-10-07 05:31:51', '2024-10-13 05:31:51'),
            (18, 'Heriyana', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:32:06', '2024-10-13 05:32:06'),
            (19, 'Rajali', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-08 05:32:20', '2024-10-13 05:32:20'),
            (20, 'Pengajuan upah packing dan loading aspal dari kolam ke gudang tgl 9 - 16 september 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,false,false,false,false,false]\"', 100, 'selesai sampai pencairan upah', 2, 4, 10, '2024-10-13 05:33:36', '2024-10-13 05:33:36'),
            (21, 'Laporan Insentif dan Lembur bulan Agustus 2024', '\"[false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', NULL, NULL, 2, 4, 10, '2024-10-13 05:34:31', '2024-10-13 05:34:31'),
            (22, 'Klaim pertanggungan di BPJS Ketenagakerjaan :', NULL, NULL, NULL, 2, 4, 10, '2024-10-13 05:35:07', '2024-10-13 05:35:07'),
            (23, '- Parisman (pengajuan pembayaran tidak masuk bekerja)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 70, 'belum update informasi dari bpjs setelah surat klaim di ajukan', 2, 4, 10, '2024-10-13 05:36:10', '2024-10-13 05:36:10'),
            (24, 'Gali Yulianto (pengajuan Klaim pembayaran tidak masuk bekerja)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 60, 'Surat Keterangan tidak masuk bekerja sudah ada', 2, 4, 10, '2024-10-13 05:37:13', '2024-10-13 05:37:13'),
            (25, 'Penerimaan kunjungan dari Polda Sultra terkait sertifikat Diklat Security', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-13 05:37:47', '2024-10-13 05:37:47'),
            (26, 'Laporan Rutin :', NULL, NULL, NULL, 2, 4, 10, '2024-10-16 05:38:08', '2024-10-13 05:38:08'),
            (27, '- Upah Helper Geologist periode 1-15 September 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:39:03', '2024-10-13 05:39:03'),
            (28, 'Laporan Tagihan Makan Kantin Daffa periode 1-15 September 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:39:42', '2024-10-13 05:39:42'),
            (29, '- Laporan absensi dan upah muttaqin periode 1-15 Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:40:21', '2024-10-13 05:40:21'),
            (30, 'cut off gaji bulan Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:41:10', '2024-10-13 05:41:10'),
            (31, 'Interview Karyawan baru untuk posisi Junior Operator Vacuum Filter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:41:51', '2024-10-13 05:41:51'),
            (32, 'Interview Karyawan baru untuk posisi Junior Operator Vacuum Filter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:42:42', '2024-10-13 05:42:42'),
            (33, 'Interview KAryawan baru 4 orang Fitter dan 2 orang Welder', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:43:12', '2024-10-13 05:43:12'),
            (34, 'Administrasi Karyawan baru untuk posisi 15 orang Junior Operator, 1 Orang Gudang, 1 orang Welder dan 2 orang Fitter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:44:00', '2024-10-13 05:44:00'),
            (35, 'Update pengajuan pengurusan Kitas 8 Orang TKA', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 80, 'Proses pembayaran PNBP', 2, 4, 10, '2024-10-24 05:44:57', '2024-10-13 05:44:57'),
            (36, 'Persiapan Dokumen Klaim Biaya Perawatan atas Kecelakaan kerja an. La Ode Asman', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true]\"', 60, 'Pengajuan Klaim ke BPJS', 2, 4, 10, '2024-10-24 05:45:45', '2024-10-13 05:45:45');
        ");
    }
}
