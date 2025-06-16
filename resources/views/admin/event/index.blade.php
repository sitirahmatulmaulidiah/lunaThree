@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Kelola Pengajuan Event</h1>

<div class="bg-white shadow-md rounded-lg overflow-x-auto">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Nama Event</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Diajukan Oleh</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $event->nama_event }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $event->user->name }}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <!-- Status Badge -->
                    @if ($event->status == 'disetujui')
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">Disetujui</span>
                    @elseif ($event->status == 'ditolak')
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">Ditolak</span>
                    @else
                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">Menunggu</span>
                    @endif
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                    @if ($event->status == 'menunggu')
                        <form action="{{ route('admin.event.approve', $event->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-green-600 hover:text-green-900">Setujui</button>
                        </form>
                        <form action="{{ route('admin.event.reject', $event->id) }}" method="POST" class="inline-block ml-3">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-yellow-600 hover:text-yellow-900">Tolak</button>
                        </form>
                    @endif
                     <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="inline-block ml-3" onsubmit="return confirm('Yakin ingin menghapus event ini secara permanen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection