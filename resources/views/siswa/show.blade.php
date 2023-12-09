@extends('layout/aplikasi')

@section('konten')
    <div class="container py-5">
        <a href='/siswa' class="btn btn-secondary"><< Kembali</a>
         @if ($data->foto)
            <div class="mb-3">
                <img style="max-width: 100px; max-height: 100px; margin-top:20px" src="{{ url('foto').'/'.$data->foto}}"/>
            </div>
        @endif
        <form>
            <div class="mb-3">
                <label for="nomor_induk" class="form-label">Nomor Induk</label>
                <input type="text" class="form-control" id="nomor_induk" aria-describedby="emailHelp" value="{{ $data->nomor_induk }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" value="{{ $data->nama }}" disabled>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" value="{{ $data->alamat }}" disabled>
            </div>
        </form>
    </div>
@endsection