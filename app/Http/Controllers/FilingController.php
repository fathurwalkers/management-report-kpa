<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Periode;
use Illuminate\Support\Carbon;
use App\Models\File;
use Illuminate\Support\Facades\Response;

class FilingController extends Controller
{
    public function preview($id)
    {
        $file = File::findOrFail($id);
        $filePath = storage_path('app/public/' . $file->file_path);

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Dapatkan ekstensi dan set Content-Type
        $extension = strtolower(pathinfo($file->file_nama, PATHINFO_EXTENSION));
        switch ($extension) {
            case 'pdf':
                $contentType = 'application/pdf';
                break;
            case 'png':
                $contentType = 'image/png';
                break;
            case 'jpg':
            case 'jpeg':
                $contentType = 'image/jpeg';
                break;
            case 'gif':
                $contentType = 'image/gif';
                break;
            default:
                // Jika tipe tidak dikenal, bisa memicu error atau mendefinisikan default
                abort(415); // Unsupported Media Type
        }

        return Response::make(file_get_contents($filePath), 200, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'inline; filename="' . $file->file_nama . '"'
        ]);
    }
}
