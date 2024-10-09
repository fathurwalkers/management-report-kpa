<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;

class Periode extends Model
{
    use HasFactory;
    protected $table = "periode";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
