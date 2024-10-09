<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;
use App\Models\Periode;
use App\Models\Login;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $guarded = [];
    protected $primaryKey = "id";

    protected $casts = [
        'laporan_jumlah_hari' => 'array',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
