<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = "area";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
