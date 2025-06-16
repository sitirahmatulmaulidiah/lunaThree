@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Kelola Wisata</h1>
    <a href="{{ route('admin.wisata.create') }}" class="bg-cyan-500 text-white px-4 py-2 rounded-lg hover:bg-cyan-600">+ Tambah Wisata</a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-x-auto">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Nama Wisata</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Harga Tiket</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wisatas as $wisata)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $wisata->nama_wisata }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Rp {{ number_format($wisata->harga_tiket) }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                    <a href="{{ route('admin.wisata.edit', ['wisatum' => $wisata->id]) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    
                    <!-- === PASTIKAN BAGIAN INI SAMA PERSIS === -->
                    <form action="{{ route('admin.wisata.destroy', ['wisatum' => $wisata->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data wisata ini secara permanen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                    </form>
                    <!-- ======================================= -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
