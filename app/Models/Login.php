<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
use App\Models\Divisi;

class Login extends Model
{
    use HasFactory;
    protected $table = "login";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
