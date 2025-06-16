@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Header Halaman -->
    <div class="relative bg-cyan-600 py-24 md:py-32">
        <div class="absolute inset-0">
            <img src="{{ asset('images/background-tentangkami.png') }}" class="w-full h-full object-cover opacity-20" alt="Latar Belakang">
        </div>
        <div class="relative container mx-auto px-6 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-extrabold">Tentang lunaThree</h1>
            <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto">Misi kami adalah untuk memperkenalkan pesona tersembunyi Kalimantan Selatan kepada dunia.</p>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto prose max-w-none text-gray-700 text-lg leading-relaxed">
                <p>
                    <strong>lunaThree</strong> adalah nama kelompok kami yang terinspirasi dari jumlah anggota, yaitu tiga orang. Kami adalah sekelompok mahasiswa dari program studi Pendidikan Komputer FKIP ULM.
                </p><br>
                <p>
                    Website ini dibuat sebagai bagian dari proyek akhir mata kuliah Pemrograman Web 2 dengan tema <strong>"Sistem Informasi Pariwisata Kalimantan Selatan"</strong>. Tujuan utama dari website ini adalah untuk memberikan informasi yang lengkap dan terpercaya seputar destinasi wisata serta event-event menarik yang ada di Kalimantan Selatan.
                </p><br>
                <p>
                    Melalui website ini, pengguna dapat menjelajahi berbagai tempat wisata, seperti wisata alam, budaya dan sejarah, religi, serta buatan. Selain itu, pengguna juga dapat melihat jadwal event atau kegiatan yang akan diselenggarakan di daerah Kalimantan Selatan.
                </p><br>
                <p>
                    Kami berharap, website ini dapat menjadi sarana promosi pariwisata lokal dan membantu masyarakat maupun wisatawan dalam merencanakan perjalanan yang menyenangkan.
                </p><br>
            </div>
            
            <!-- Tim Kami -->
            <div class="mt-20">
                <h2 class="section-title mb-12">Tim Kami</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 text-center">
                    
                    <!-- Anggota Tim 1 -->
                    <div class="flex flex-col items-center">
                        <img class="w-40 h-40 rounded-full mb-4 shadow-lg object-cover" src="{{ asset('images/siti.jpg') }}" alt="Foto Siti Rahmatul Maulidiah">
                        <h3 class="text-xl font-bold text-gray-800">Siti Rahmatul Maulidiah</h3>
                        <p class="text-gray-500">Project Leader & Backend Developer</p>
                    </div>

                    <!-- Anggota Tim 2 -->
                    <div class="flex flex-col items-center">
                        <img class="w-40 h-40 rounded-full mb-4 shadow-lg object-cover" src="{{ asset('images/putu.jpg') }}" alt="Foto Putu Devia Marsa">
                        <h3 class="text-xl font-bold text-gray-800">Putu Devia Marsa</h3>
                        <p class="text-gray-500">Frontend Developer & UI/UX Designer</p>
                    </div>

                    <!-- Anggota Tim 3 -->
                    <div class="flex flex-col items-center">
                        <img class="w-40 h-40 rounded-full mb-4 shadow-lg object-cover" src="{{ asset('images/shofia.jpg') }}" alt="Foto Shofia Pramudia">
                        <h3 class="text-xl font-bold text-gray-800">Shofia Pramudia</h3>
                        <p class="text-gray-500">Content & Database Manager</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
