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
        $totaljurusan = JurusanModel::all();
        $totalmahasiswa = MahasiswaModel::count();
        $mahasiswa = MahasiswaModel::getALLmahasiswa();
        
        // Gender data (assuming there's a 'gender' column in MahasiswaModel)
        $genderCount = MahasiswaModel::selectRaw('gender, count(*) as count')
            ->groupBy('gender')
            ->get();

        return view('index', compact('totalmahasiswa', 'totaljurusan', 'mahasiswa', 'genderCount'));
    
    }
}
