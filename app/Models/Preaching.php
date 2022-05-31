<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Preaching extends Model
{
    use HasFactory;

    public function church(){
        return $this->belongsTo(Church::class);
    }

    public function getSize(){
        $size=File::size(public_path('storage/'.$this->audio_file_url));
        $base = log($size) / log(1024);
        $suffix = array("B", "KB", "MB", "GB", "TB");
        $f_base = floor($base);
        return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
    }

    public function getExtension(){
        $extension=File::extension(public_path('storage/'.$this->audio_file_url));
        return $extension;
    }
}
