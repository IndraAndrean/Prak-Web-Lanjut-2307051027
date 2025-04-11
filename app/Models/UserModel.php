<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Jika tabel dalam database bernama 'user', biarkan ini.
    // Jika tabelnya 'users', lebih baik hapus baris ini.
    protected $table = 'user';

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Method untuk mengambil seluruh data user dengan join ke tabel kelas
    public function getUser($id = null){
        if($id != null)

        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
        ->select('user.*', 'kelas.nama_kelas as nama_kelas')
         ->where('user.id', $id)
         ->first();

        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
     ->select('user.*', 'kelas.nama_kelas as nama_kelas')
      ->get();
    }
}
