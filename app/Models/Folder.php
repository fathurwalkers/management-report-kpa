<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;
use App\Models\File;

class Folder extends Model
{
    use HasFactory;
    protected $table = "folder";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function divisi()
    {
        $this->belongsTo(Divisi::class);
    }

    public function file()
    {
        $this->hasMany(File::class);
    }
}
