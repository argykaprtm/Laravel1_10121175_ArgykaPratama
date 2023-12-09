<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = guru::orderBy('nomor_induk', 'asc')->paginate(5);
        return view('guru/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('guru/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk',$request->nomor_induk);
        Session::flash('nama',$request->nama);
        Session::flash('alamat',$request->alamat);
        $request->validate([
            'nomor_induk'=>'required|numeric',
            'nama'=>'required',
            'alamat'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'
        ],[
            'nomor_induk.required'=>'Nomor Induk wajib diisi.',
            'nomor_induk.numeric'=>'Nomor Induk wajib diisi dalam bentuk angka.',
            'nama.required'=>'Nama wajib diisi.',
            'alamat.required'=>'Alamat wajib diisi.',
            'foto.required'=>'Silahkan masukkan foto.',
            'foto.mimes'=>'Foto hanya diperbolehkan jpeg, jpg, png, gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        guru::create($data);
        return redirect('guru')->with('success','Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = guru::where('nomor_induk', $id)->first();
        return view('guru/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = guru::where('nomor_induk', $id)->first();
        return view('guru/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required'
        ],[
            'nomor_induk.numeric'=>'Nomor Induk wajib diisi dalam bentuk angka.',
            'nama.required'=>'Nama wajib diisi.',
            'alamat.required'=>'Alamat wajib diisi.'
        ]);
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto'=>'mimes:jpeg,jpg,png,gif'
            ],[
                'foto.mimes'=>'Foto hanya diperbolehkan jpeg, jpg, png, gif'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama);
            // Sudah terupload ke direktori

            $data_foto = guru::where('nomor_induk', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            // $data = [
            //     'foto' => $foto_nama
            // ];

            $data['foto'] = $foto_nama;
        }

        guru::where('nomor_induk', $id)->update($data);
        return redirect('/guru')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = guru::where('nomor_induk', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        guru::where('nomor_induk', $id)->delete();
        return redirect('/guru')->with('success', 'Berhasil menghapus data.');
    }
}
