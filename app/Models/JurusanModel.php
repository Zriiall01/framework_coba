<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JurusanModel extends Model
{
    use HasFactory;
    protected $table = 'jurusan';

    protected $guarded = [];

    public static function getALLjurusan()
    {
        $query = DB::table('jurusan')
            ->leftjoin('mahasiswa', 'mahasiswa.jurusan_id', '=', 'jurusan.jurusan_id')
            ->orderby('jurusan.jurusan_id')
            ->get(['jurusan.jurusan_id', 'jurusan.nama_jrs']);
        return $query;
    }
}
