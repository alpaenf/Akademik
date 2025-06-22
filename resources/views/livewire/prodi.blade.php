<div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-100">
                    <i class="fas fa-graduation-cap mr-2 text-green-400"></i>Data Program Studi
                </h2>
                <button wire:click="create" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    <i class="fas fa-plus mr-2"></i>Tambah Program Studi
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
                    {{ $isEditing ? 'Edit Program Studi' : 'Tambah Program Studi Baru' }}
                </h3>
                
                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nama Program Studi</label>
                            <input wire:model="nama_prodi" type="text" placeholder="Masukkan nama program studi" 
                                   class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-100 placeholder-gray-400">
                            @error('nama_prodi') 
                                <span class="text-red-400 text-sm">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Fakultas</label>
                            <select wire:model="fakultas_id" 
                                    class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white">
                                <option value="">Pilih Fakultas</option>
                                @foreach($fakultas as $f)
                                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                                @endforeach
                            </select>
                            @error('fakultas_id') 
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
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
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
                                <i class="fas fa-graduation-cap mr-2"></i>Program Studi
                            </th>
                            <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-university mr-2"></i>Fakultas
                            </th>
                            <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-700">
                        @forelse($prodi as $p)
                        <tr class="hover:bg-gray-600 transition-colors">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                                <div class="text-sm leading-5 text-gray-100 font-medium">{{ $p->nama_prodi }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                                <div class="text-sm leading-5 text-gray-100">{{ $p->fakultas->nama_fakultas ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600 text-sm font-medium">
                                <button wire:click="edit({{ $p->id }})" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded transition-colors mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button wire:click="delete({{ $p->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-3 rounded transition-colors" 
                                        onclick="return confirm('Yakin ingin menghapus program studi ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-400">
                                <i class="fas fa-database mr-2"></i>Tidak ada data program studi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($prodi->hasPages())
            <div class="mt-4">
                {{ $prodi->links() }}
            </div>
            @endif
        </div>
    </div>
</div> 