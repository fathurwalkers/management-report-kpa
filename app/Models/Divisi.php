<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;

class Divisi extends Model
{
    use HasFactory;
    protected $table = "divisi";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function login()
    {
        return $this->hasMany(Login::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
