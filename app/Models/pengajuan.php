<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    use HasFactory;

    protected $table = "pengajuan";
    protected $primaryKey = "id_pengajuan";
    protected $fillable = ["id_pengajuan", "id_kategori", "id_user", "tentang", "unit_kerja"];

    public function pengajuan() {
        return $this->belongsTo(kategori::class, 'id_pengajuan');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
