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

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
