<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discuss extends Model
{
    use HasFactory;

    protected $table = "discuss";
    protected $primaryKey = "id_disc";
    protected $fillable = ["id_disc", "id_user", "id_pengajuan", "isi", "tambah_berkas"];


    protected function pengajuan() {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }

    protected function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
