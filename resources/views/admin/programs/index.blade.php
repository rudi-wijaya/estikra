@extends('layouts.app')

@section('title', 'Kelola Program Unggulan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Program Unggulan</h1>
        <a href="{{ route('admin.programs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            + Tambah Program
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($programs->isEmpty())
        <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
            <p>Belum ada program unggulan. Silakan tambahkan program baru.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($programs as $program)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    {{-- Program Image --}}
                    <div class="w-full h-40 bg-blue-100 flex items-center justify-center overflow-hidden">
                        @if($program->foto)
                            <img src="{{ asset('storage/' . $program->foto) }}" alt="{{ $program->judul }}" class="w-full h-full object-cover">
                        @else
                            <i class="bi bi-image text-blue-400 text-4xl"></i>
                        @endif
                    </div>

                    {{-- Program Info --}}
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $program->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $program->deskripsi }}</p>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.programs.edit', $program) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center px-3 py-2 rounded text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus program ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
