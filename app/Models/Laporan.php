<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
