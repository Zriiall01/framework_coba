<?php

namespace App\Http\Controllers;

use App\Models\DashboardModel;
use App\Models\JurusanModel;
use App\Models\MahasiswaModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totaljurusan1 = JurusanModel::count();
        $totalmahasiswa = MahasiswaModel::count();
        $mahasiswa1 = MahasiswaModel::getALLmahasiswa();
        return view('index', compact('totalmahasiswa', 'totaljurusan1','mahasiswa1'));
    }
}
