@extends('layouts.app')

@section('title', 'Edit Staff: ' . $user->name)

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Edit Staff</h1>
        <p class="text-gray-600">Formulir untuk memperbarui informasi staff.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email (tidak bisa diubah) --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" disabled
                           class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 text-gray-600 cursor-not-allowed">
                </div>

                {{-- Telepon --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                    <select name="role" id="role"
                            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('role') border-red-500 @enderror">
                        <option value="kasir" {{ old('role', $user->role) == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Alamat --}}
            <div class="mt-6">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="address" id="address" rows="3"
                          class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3 mt-6">
                <a href="{{ route('users.index') }}" class="px-4 py-2 text-sm bg-gray-200 rounded-md hover:bg-gray-300 text-gray-700">Batal</a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xs font-semibold uppercase rounded-md hover:bg-blue-700">
                    <i class="fas fa-save mr-2"></i> Perbarui Staff
                </button>
            </div>
        </form>
    </div>
@endsection
