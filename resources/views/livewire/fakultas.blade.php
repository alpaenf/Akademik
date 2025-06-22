<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">
                <i class="fas fa-university mr-2 text-purple-400"></i>Data Fakultas
            </h2>
            <button wire:click="create" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Fakultas
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
                {{ $isEditing ? 'Edit Fakultas' : 'Tambah Fakultas Baru' }}
            </h3>
            
            <form wire:submit.prevent="store">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Fakultas</label>
                        <select wire:model="nama_fakultas" 
                                class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-white">
                            <option value="">Pilih Fakultas</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                            <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                            <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                            <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                            <option value="Fakultas Peternakan">Fakultas Peternakan</option>
                            <option value="Fakultas Kesehatan Masyarakat">Fakultas Kesehatan Masyarakat</option>
                            <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                            <option value="Fakultas Perikanan dan Ilmu Kelautan">Fakultas Perikanan dan Ilmu Kelautan</option>
                        </select>
                        @error('nama_fakultas') 
                            <span class="text-red-400 text-sm">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            <i class="fas fa-save mr-2"></i>{{ $isEditing ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" wire:click="resetForm" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        Batal
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
                            <i class="fas fa-list-ol mr-2"></i>No
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            <i class="fas fa-university mr-2"></i>Nama Fakultas
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            <i class="fas fa-graduation-cap mr-2"></i>Jumlah Program Studi
                        </th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @forelse($fakultasList as $index => $f)
                    <tr class="hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100 font-medium">{{ $index + 1 }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100 font-medium">{{ $f->nama_fakultas }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $f->prodi_count ?? '0' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600 text-sm font-medium">
                            <button wire:click="edit({{ $f->id }})" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded transition-colors mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button wire:click="delete({{ $f->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-3 rounded transition-colors" 
                                    onclick="return confirm('Yakin ingin menghapus fakultas ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-400">
                            <i class="fas fa-database mr-2"></i>Belum ada data fakultas
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($fakultasList->hasPages())
        <div class="mt-4">
            {{ $fakultasList->links() }}
        </div>
        @endif
    </div>
</div>