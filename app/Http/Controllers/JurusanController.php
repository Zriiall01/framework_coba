<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = [
            'jurusan' => JurusanModel::getALLjurusan(),
            'no' => 1,
        ];
        return view('Jurusan.Jurusan', $data);
    }

    public function tambah()
    {
        return view('Jurusan.Tambah_Jrs');
    }

    public function tambah_action(Request $request)
    {
        $request->validate([
            'jurusan' => 'required'
        ]);

        $data = [
            'nama_jrs' => $request->jurusan
        ];

        JurusanModel::create($data);
        return redirect('/jurusan');
    }

    public function Edit($id)
    {
        $data = JurusanModel::where('jurusan_id', $id)->first();
        return view('Jurusan.Edit_jrs', compact('data'));
    }

    public function Edit_action($id, Request $request)
    {
        $request->validate([
            'jurusan' => 'required'
        ]);

        $data = [
            'nama_jrs' => $request->jurusan
        ];

        JurusanModel::where('jurusan_id', $id)->update($data);
        return redirect('/jurusan');
    }

    public function Hapus($id)
    {
        JurusanModel::where('jurusan_id', $id)->delete();
        return redirect('/jurusan');
    }
}
