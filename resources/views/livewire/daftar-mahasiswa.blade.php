<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">Daftar Mahasiswa & Rekap SKS</h2>
            <div class="relative">
                <input wire:model.live="search" type="text" placeholder="Cari mahasiswa..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-gray-400">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg">
                <thead class="bg-gray-600">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Program Studi</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Total SKS</th>
                        <th class="px-6 py-3 border-b border-gray-500 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @forelse($mahasiswa as $mhs)
                    <tr class="hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mhs->nim }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mhs->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mhs->prodi->nama_prodi ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600">
                            <div class="text-sm leading-5 text-gray-100">{{ $mhs->krs->sum(fn($k) => $k->matakuliah->sks) }} SKS</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-600 text-sm font-medium">
                            <button wire:click="selectMahasiswa({{ $mhs->id }})" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <i class="fas fa-eye mr-1"></i>Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                            Tidak ada data mahasiswa
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $mahasiswa->links() }}
        </div>

        <!-- Detail KRS Modal -->
        @if($selectedMahasiswa)
        <div class="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-gray-800 border-gray-600">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-100 mb-4">Detail KRS Mahasiswa</h3>
                    
                    @if($rekapSks)
                        @foreach($rekapSks as $semester => $krsList)
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-200 mb-3">Semester {{ $semester }}</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th class="px-4 py-2 border-b border-gray-500 text-left text-xs font-medium text-gray-300 uppercase">Kode</th>
                                            <th class="px-4 py-2 border-b border-gray-500 text-left text-xs font-medium text-gray-300 uppercase">Mata Kuliah</th>
                                            <th class="px-4 py-2 border-b border-gray-500 text-left text-xs font-medium text-gray-300 uppercase">SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($krsList as $krs)
                                        <tr class="hover:bg-gray-600">
                                            <td class="px-4 py-2 border-b border-gray-600 text-gray-100">{{ $krs->matakuliah->kode }}</td>
                                            <td class="px-4 py-2 border-b border-gray-600 text-gray-100">{{ $krs->matakuliah->nama_matakuliah ?? '-' }}</td>
                                            <td class="px-4 py-2 border-b border-gray-600 text-gray-100">{{ $krs->matakuliah->sks }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-gray-400">Tidak ada data KRS untuk mahasiswa ini.</p>
                    @endif
                    
                    <div class="flex justify-end mt-6">
                        <button wire:click="selectMahasiswa(null)" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
