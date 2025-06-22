<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">
                <i class="fas fa-users mr-2 text-blue-400"></i>Data Mahasiswa
            </h2>
            <button wire:click="create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Mahasiswa
            </button>
        </div>

        @if (session()->has('success'))
            <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-4">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-4">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <!-- Form Section -->
        <div class="bg-gray-700 rounded-lg p-6 mb-6 border border-gray-600">
            <h3 class="text-lg font-semibold mb-4 text-gray-100">
                {{ $isEditing ? 'Edit Mahasiswa' : 'Tambah Mahasiswa Baru' }}
            </h3>
            
            <form wire:submit.prevent="store">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">NIM</label>
                        <input wire:model="nim" type="text" placeholder="Masukkan NIM" 
                               class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-gray-400">
                        @error('nim') 
                            <span class="text-red-400 text-sm">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama</label>
                        <input wire:model="nama" type="text" placeholder="Masukkan Nama" 
                               class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-gray-400">
                        @error('nama') 
                            <span class="text-red-400 text-sm">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Program Studi</label>
                        <select wire:model="prodi_id" 
                                class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            <option value="">Pilih Program Studi</option>
                            @foreach($prodi as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                            @endforeach
                        </select>
                        @error('prodi_id') 
                            <span class="text-red-400 text-sm">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" wire:click="resetForm" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        <i class="fas fa-save mr-2"></i>{{ $isEditing ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg">
                <thead class="bg-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            <i class="fas fa-id-card mr-2"></i>NIM
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            <i class="fas fa-user mr-2"></i>Nama
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            <i class="fas fa-graduation-cap mr-2"></i>Program Studi
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @forelse($mahasiswa as $m)
                    <tr class="hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100 font-medium">{{ $m->nim }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $m->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $m->prodi->nama_prodi ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600 text-sm font-medium">
                            <button wire:click="edit({{ $m->id }})" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mr-2 transition">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button wire:click="delete({{ $m->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded transition"
                                    onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-400">
                            <i class="fas fa-database mr-2"></i>Tidak ada data mahasiswa
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($mahasiswa->hasPages())
        <div class="mt-4">
            {{ $mahasiswa->links() }}
        </div>
        @endif
    </div>
</div>