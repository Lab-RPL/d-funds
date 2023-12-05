<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_pelaksana extends Model
{
    use HasFactory;

    protected $table = "status_pelaksana";
    protected $primaryKey = "id_status";
    protected $fillable = ["id_status", "id_pengajuan", "nilai_status"];

    protected function pengajuan() {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
}
