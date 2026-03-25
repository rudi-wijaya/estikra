@extends('layouts.app')

@section('title', 'Tambah Program Unggulan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Tambah Program Unggulan</h1>
    </div>

    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul Program</label>
                <input 
                    type="text" 
                    id="judul" 
                    name="judul" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('judul') border-red-500 @enderror"
                    value="{{ old('judul') }}"
                    required
                >
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea 
                    id="deskripsi" 
                    name="deskripsi" 
                    rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('deskripsi') border-red-500 @enderror"
                    required
                >{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto Program</label>
                <input 
                    type="file" 
                    id="foto" 
                    name="foto" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('foto') border-red-500 @enderror"
                    accept="image/*"
                >
                <p class="text-gray-500 text-sm mt-1">Format: JPEG, PNG, JPG, GIF. Max: 5MB</p>
                @error('foto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Simpan Program
                </button>
                <a href="{{ route('admin.programs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
