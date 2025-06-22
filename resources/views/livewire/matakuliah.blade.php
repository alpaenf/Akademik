<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">Manajemen Mata Kuliah</h2>
            <button wire:click="create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Mata Kuliah
            </button>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <input wire:model.live="search" type="text" placeholder="Cari mata kuliah..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-gray-400">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <!-- Form Modal -->
        @if($isEditing || !$isEditing)
        <div class="bg-gray-700 rounded-lg p-6 mb-6 border border-gray-600">
            <h3 class="text-lg font-semibold mb-4 text-gray-100">{{ $isEditing ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah Baru' }}</h3>
            
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Kode Mata Kuliah</label>
                        <input wire:model="kode" type="text" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                        @error('kode') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Mata Kuliah</label>
                        <input wire:model="nama" type="text" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                        @error('nama') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">SKS</label>
                        <input wire:model="sks" type="number" min="1" max="6" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                        @error('sks') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Semester</label>
                        <select wire:model="semester" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            <option value="">Pilih Semester</option>
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                        @error('semester') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Program Studi</label>
                        <select wire:model="prodi_id" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            <option value="" class="bg-gray-700 text-white">Pilih Program Studi</option>
                            @foreach($prodi as $prodi)
                                <option value="{{ $prodi->id }}" class="bg-gray-700 text-white">{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                        @error('prodi_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Fakultas</label>
                        <select wire:model="fakultas_id" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            <option value="" class="bg-gray-700 text-white">Pilih Fakultas</option>
                            @foreach($fakultas as $fak)
                                <option value="{{ $fak->id }}" class="bg-gray-700 text-white">{{ $fak->nama_fakultas }}</option>
                            @endforeach
                        </select>
                        @error('fakultas_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Dosen</label>
                        <input wire:model="dosen" type="text" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100">
                        @error('dosen') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                        <select wire:model="status" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                        @error('status') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button wire:click="resetForm" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        <i class="fas fa-save mr-2"></i>{{ $isEditing ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
        @endif

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg">
                <thead class="bg-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Semester</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Prodi</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Fakultas</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @forelse($matakuliah as $mk)
                    <tr class="hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->kode }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->sks }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->semester }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->prodi->nama_prodi ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mk->fakultas->nama_fakultas ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $mk->status === 'aktif' ? 'bg-green-900 text-green-100' : 'bg-red-900 text-red-100' }}">
                                {{ ucfirst($mk->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600 text-sm font-medium">
                            <button wire:click="edit({{ $mk->id }})" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mr-2 transition">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button wire:click="delete({{ $mk->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded transition"
                                onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-400">
                            Tidak ada data mata kuliah
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $matakuliah->links() }}
        </div>
    </div>
</div>
