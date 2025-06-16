@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Daftar Event yang Saya Ajukan</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Event</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $event->nama_event }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ \Carbon\Carbon::parse($event->tanggal)->format('d/m/Y') }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if ($event->status == 'disetujui')
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Disetujui</span>
                            </span>
                        @elseif ($event->status == 'ditolak')
                             <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">Ditolak</span>
                            </span>
                        @else
                            <span class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                <span class="relative">Menunggu</span>
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-10 text-gray-500">Anda belum pernah mengajukan event.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
     <!-- Pagination Links -->
    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection
