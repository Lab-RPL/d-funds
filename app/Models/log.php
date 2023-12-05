<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;

    protected $table = "log";
    protected $primaryKey = "id_log";
    protected $fillable = ["id_log", "id_pengajuan", "isi_log"];

    protected function pengajuan() {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
}
