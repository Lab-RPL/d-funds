<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;

    protected $table = "dokumen";
    protected $primaryKey = "id_dokumen";
    protected $fillable = ["id_dokumen", "id_pengajuan", "id_disc", "nama_dokumen", "nama_file"];

    protected function pengajuan() {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
    protected function discuss() {
        return $this->belongsTo(discuss::class, 'id_disc');
    }
}
