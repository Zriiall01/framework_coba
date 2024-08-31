<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $guarded = ['mahasiswa_id'];

    public static function getALLmahasiswa()
    {
        $query = DB::table('mahasiswa')
            ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.jurusan_id')->get();
        return $query;
    }
}
