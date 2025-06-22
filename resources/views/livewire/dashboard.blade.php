<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">Dashboard Akademik</h2>
            <p class="text-gray-400">Ringkasan data akademik terkini</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Mahasiswa Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Total Mahasiswa</p>
                        <p class="text-3xl font-bold">{{ $totalMahasiswa ?? '-' }}</p>
                    </div>
                    <div class="bg-blue-500 rounded-full p-3">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-blue-100">Aktif: 824</span>
                    <span class="text-blue-100">Alumni: 430</span>
                </div>
            </div>
            
            <!-- Prodi Card -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Program Studi</p>
                        <p class="text-3xl font-bold">{{ $totalProdi ?? '-' }}</p>
                    </div>
                    <div class="bg-green-500 rounded-full p-3">
                        <i class="fas fa-list-alt text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-green-100">S1: 8</span>
                    <span class="text-green-100">D3: 4</span>
                </div>
            </div>
            
            <!-- Fakultas Card -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-lg p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Fakultas</p>
                        <p class="text-3xl font-bold">{{ $totalFakultas ?? '-' }}</p>
                    </div>
                    <div class="bg-purple-500 rounded-full p-3">
                        <i class="fas fa-university text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-purple-100">Dosen: 24</span>
                </div>
            </div>
            
            <!-- Mata Kuliah Card -->
            <div class="bg-gradient-to-r from-orange-600 to-orange-700 rounded-lg p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Mata Kuliah</p>
                        <p class="text-3xl font-bold">{{ $totalMatakuliah ?? '-' }}</p>
                    </div>
                    <div class="bg-orange-500 rounded-full p-3">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-orange-100">Total SKS: 2,340</span>
                    <span class="text-orange-100">Rata-rata: 15</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-100 mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('mahasiswa') }}" class="bg-gray-700 border border-gray-600 rounded-lg p-4 hover:bg-gray-600 transition-colors group">
                    <div class="flex items-center">
                        <div class="bg-blue-500 rounded-full p-2 mr-3 group-hover:bg-blue-400 transition-colors">
                            <i class="fas fa-user-plus text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-100">Tambah Mahasiswa</h4>
                            <p class="text-sm text-gray-400">Daftarkan mahasiswa baru</p>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('matakuliah') }}" class="bg-gray-700 border border-gray-600 rounded-lg p-4 hover:bg-gray-600 transition-colors group">
                    <div class="flex items-center">
                        <div class="bg-green-500 rounded-full p-2 mr-3 group-hover:bg-green-400 transition-colors">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-100">Tambah Mata Kuliah</h4>
                            <p class="text-sm text-gray-400">Buat mata kuliah baru</p>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('krs') }}" class="bg-gray-700 border border-gray-600 rounded-lg p-4 hover:bg-gray-600 transition-colors group">
                    <div class="flex items-center">
                        <div class="bg-purple-500 rounded-full p-2 mr-3 group-hover:bg-purple-400 transition-colors">
                            <i class="fas fa-clipboard-list text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-100">Kelola KRS</h4>
                            <p class="text-sm text-gray-400">Atur kartu rencana studi</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-100 mb-4">Aktivitas Terbaru</h3>
            <div class="bg-gray-700 border border-gray-600 rounded-lg">

                {{-- Mahasiswa Baru --}}
                @forelse($recentMahasiswa as $mhs)
                <div class="p-4 border-b border-gray-600">
                    <div class="flex items-center">
                        <div class="bg-green-500 rounded-full p-2 mr-3">
                            <i class="fas fa-user-plus text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-100">Mahasiswa baru terdaftar</p>
                            <p class="text-sm text-gray-400">{{ $mhs->nama }} - {{ $mhs->prodi->nama_prodi ?? '-' }}</p>
                        </div>
                        <span class="ml-auto text-sm text-gray-500">{{ $mhs->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @empty
                <div class="p-4 text-gray-400">Belum ada mahasiswa baru.</div>
                @endforelse

                {{-- Mata Kuliah Baru --}}
                @forelse($recentMatakuliah as $mk)
                <div class="p-4 border-b border-gray-600">
                    <div class="flex items-center">
                        <div class="bg-blue-500 rounded-full p-2 mr-3">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-100">Mata kuliah baru ditambahkan</p>
                            <p class="text-sm text-gray-400">{{ $mk->nama_matakuliah }} - Semester {{ $mk->semester ?? '-' }}</p>
                        </div>
                        <span class="ml-auto text-sm text-gray-500">{{ $mk->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @empty
                <div class="p-4 text-gray-400">Belum ada mata kuliah baru.</div>
                @endforelse

                {{-- KRS Terbaru --}}
                @forelse($recentKrs as $krs)
                <div class="p-4 border-b border-gray-600">
                    <div class="flex items-center">
                        <div class="bg-purple-500 rounded-full p-2 mr-3">
                            <i class="fas fa-clipboard-check text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-100">KRS disetujui</p>
                            <p class="text-sm text-gray-400">
                                {{ $krs->mahasiswa->nama ?? '-' }} -
                                {{ $krs->matakuliah->nama_matakuliah ?? '-' }} ({{ $krs->matakuliah->sks ?? '-' }} SKS)
                            </p>
                        </div>
                        <span class="ml-auto text-sm text-gray-500">{{ $krs->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @empty
                <div class="p-4 text-gray-400">Belum ada aktivitas KRS terbaru.</div>
                @endforelse

            </div>
        </div>
        <!-- Tombol Scroll to Top -->
        <button id="scrollTopBtn" class="fixed bottom-6 right-6 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-800 transition hidden z-50">⬆️</button>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('scrollTopBtn');
            window.addEventListener('scroll', function () {
                btn.style.display = window.scrollY > 200 ? 'block' : 'none';
            });
            btn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        </script>
    </div>
</div>