@extends('layouts.app')

@section('title', 'Tambah Staff Baru')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tambah Staff Baru</h1>
        <p class="text-gray-600">Formulir untuk menambahkan data staff/admin ke sistem.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Telepon --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Peran <span class="text-red-500">*</span></label>
                    <select name="role" id="role"
                            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('role') border-red-500 @enderror">
                        <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500">
                </div>
            </div>

            {{-- Alamat --}}
            <div class="mt-6">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="address" id="address" rows="3"
                          class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3 mt-6">
                <a href="{{ route('users.index') }}" class="px-4 py-2 text-sm bg-gray-200 rounded-md hover:bg-gray-300 text-gray-700">Batal</a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xs font-semibold uppercase rounded-md hover:bg-blue-700">
                    <i class="fas fa-save mr-2"></i> Simpan Staff
                </button>
            </div>
        </form>
    </div>
@endsection
