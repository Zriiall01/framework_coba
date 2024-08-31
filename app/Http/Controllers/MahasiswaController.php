<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use illuminate\support\str;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = [
            'mahasiswa' => MahasiswaModel::getALLmahasiswa(),
            'no' => 1,
        ];
        return view('Mahasiswa.Mahasiswa', $data);
    }

    public function tambah()
    {
        $jurusan = JurusanModel::all();
        return view('Mahasiswa.Tambah_mahasiswa', compact('jurusan'));
    }

    public function tambah_action(Request $request)
    {
        $token=uniqid();
        
        $request->validate([
            'mahasiswa' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'foto'=>'required',
            'deskripsi'=> 'required'
        ]);

        $file=$request->file('foto');

        $gambar=$token.'.'.$file->getClientOriginalExtension();

        $data = [
            'nama_mhs' => $request->mahasiswa,
            'nim_mhs' => $request->npm,
            'jurusan_id' => $request->jurusan,
            'foto'=>$gambar,
            'deskripsi'=> $request->deskripsi
        ];

        $file->move('gambar', $gambar);

        MahasiswaModel::create($data);
        return redirect('/mahasiswa');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $token = Str::random(12);

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $token . '.' . $extension;

            $request->file('upload')->move(public_path('deskripsi'), $fileName);

            $url = asset('deskripsi/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function Edit($id)
    {
        $data = MahasiswaModel::where('mahasiswa_id', $id)->first();
        $jurusan = JurusanModel::getALLjurusan();
        return view('Mahasiswa.Edit_mahasiswa', compact('data', 'jurusan'));
    }

    public function Edit_action($id, Request $request)
    {
        $token=uniqid();

        $request->validate([
            'mahasiswa' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
        ]);

        $file=$request->file('foto');
        $mahasiswa = MahasiswaModel::where('mahasiswa_id', $id)->first();

        $data = [
            'nama_mhs' => $request->mahasiswa,
            'nim_mhs' => $request->npm,
            'jurusan_id' => $request->jurusan,
        ];

        if ($file) {
            $gambar =$token . '.' . $file->getClientOriginalExtension();
            $data['foto'] = $gambar;
            $file->move('gambar', $gambar);
        } else {
            $data['foto'] = $mahasiswa->foto;
        }

        MahasiswaModel::where('mahasiswa_id', $id)->update($data);
        return redirect('/mahasiswa');
    }

    public function Hapus($id)
    {
        MahasiswaModel::where('mahasiswa_id', $id)->delete();
        return redirect('/mahasiswa');
    }
}
