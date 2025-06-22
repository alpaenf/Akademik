<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-700">
        <h2 class="text-2xl font-bold text-gray-100 mb-6">Form KRS (Kartu Rencana Studi)</h2>

        @if (session()->has('message'))
            <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="store">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Mahasiswa</label>
                    <select wire:model="mahasiswa_id" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                        <option value="">Pilih Mahasiswa</option>
                        @foreach($mahasiswas as $mhs)
                            <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tahun Akademik</label>
                    <input wire:model="tahun_akademik" type="text" placeholder="2023/2024" class="w-full px-3 py-2 bg-gray-600 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-gray-400">
                    @error('tahun_akademik') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-300 mb-4">Pilih Mata Kuliah</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($matakuliahs as $m)
                        <div class="bg-gray-700 border border-gray-600 rounded-lg p-4 hover:bg-gray-600 transition-colors">
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="selectedMatkul" value="{{ $m->id }}" class="rounded border-gray-500 text-blue-600 focus:ring-blue-500 bg-gray-600">
                                <div class="ml-3">
                                    <div class="font-medium text-gray-100">{{ $m->kode }}</div>
                                    <div class="text-sm text-gray-400">{{ $m->nama_matakuliah }} ({{ $m->sks }} SKS)</div>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('selectedMatkul') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    <i class="fas fa-save mr-2"></i>Simpan KRS
                </button>
            </div>
        </form>
    </div>
</div>
