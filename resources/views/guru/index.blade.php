@extends('layout/aplikasi')

@section('konten')
    <div class="container py-5">
    <a href="guru/create" class="btn btn-primary">+Tambah Guru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img style="max-width: 50px; max-height:50px" src="{{ url('foto').'/'.$item->foto }}">
                        @endif
                    </td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href='{{ url('/guru/'.$item->nomor_induk) }}'>Detail</a>
                        <a class="btn btn-warning btn-sm" href='{{ url('/guru/'.$item->nomor_induk.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Hapus data Nomor Induk {{ $item->nomor_induk }}?')" class="d-inline" action="{{ '/guru/'.$item->nomor_induk }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
    </div>
@endsection