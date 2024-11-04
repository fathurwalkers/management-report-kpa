<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;
use App\Models\Login;

class File extends Model
{
    use HasFactory;
    protected $table = "file";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function folder()
    {
        $this->belongsTo(Folder::class);
    }

    public function login()
    {
        $this->belongsTo(Login::class);
    }
}
