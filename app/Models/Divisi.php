<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;

class Divisi extends Model
{
    use HasFactory;
    protected $table = "data";
    protected $guarded = [];
    protected $primaryKey = "id";

    // HRD
    // IT
    // PURCHASHING
    // ADMIN
    // FINANCE
    // MINING

    public function login()
    {
        return $this->hasMany(Login::class);
    }
}
