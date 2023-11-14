<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id_user' => 1,
            'username' => "admin",
            'password' => bcrypt(123),
            'user_type' => "admin"
        ]);
        User::create([
            'id_user' => 2,
            'username' => "dosen",
            'password' => bcrypt(123),
            'user_type' => "pejabat"
        ]);
        User::create([
            'id_user' => 3,
            'username' => "juan",
            'password' => bcrypt(123),
            'user_type' => "user"
        ]);
        User::create([
            'id_user' => 4,
            'username' => "kour",
            'password' => bcrypt(123),
            'user_type' => "kour"
        ]);
        User::create([
            'id_user' => 5,
            'username' => "ronron",
            'password' => bcrypt(123),
            'user_type' => "pelaksana"
        ]);

        kategori::create([
            'id_kategori' => 1,
            'kategori' => "Kunjungan",
            'obj_pembayaran' => "Rekanan",
            'deskripsi' => "1. Kwitansi Bus / Transport Sewa
                            1a. Foto STNK
                            1b. Foto Bus dari depan, dalam, dan belakang
                            2. Kwitansi Penginapan
                            3. Kwitansi Transport Lokal (Grab, Gojek, dll)"
        ]);
        kategori::create([
            'id_kategori' => 2,
            'kategori' => "Biaya Perjalanan Dinas",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "1. Surat Tugas
                            2. SPPD dan Lampiran berstempel
                            3. Tiket Pesawat / Kereta dan Boarding Pass
                            4. Kwitansi Penginapan
                            5. Laporan Kegitan (lampiran foto)"
        ]);
        kategori::create([
            'id_kategori' => 3,
            'kategori' => "Honorarium Narsum",
            'obj_pembayaran' => "Mitra",
            'deskripsi' => "1a. FC KTP Narasumber
                            1b. FC NPWP Narasumber
                            1c. FC Rekening Narasumber
                            1d. No. Telepon
                            1e. Instansi Asal
                            2. Surat Permohonan sebagai Narasumber dam Rundown 
                            3. Surat jawaban kesediaan sebagai Narasumber
                            4. Notulen / Materi
                            5. Foto kegiatan (Screenshot acara dari awal, tengah dan akhir.)
                            6. Brosur terkait kegiatan
                            7. CV Pembicara
                            8. Jadwal acara (rundown kegiatan)
                            9a. Daftar hadir pemateri
                            9b. Daftar hadir peserta luring
                            9c. Daftar hadir peserta daring
                            10. Foto Narasumber bertanda tangan PIC
                            11. Surat Tugas dari instansi pihak narasumber (bila ada)", 
        ]);
        kategori::create([
            'id_kategori' => 4,
            'kategori' => "Tunjangan Struktural",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "Formulir pengajuan dilampiri SK untuk pejabat baru", 
        ]);
        kategori::create([
            'id_kategori' => 5,
            'kategori' => "Tunjangan Fungsional",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir pengajuan dilampiri SK untuk pejabat baru", 
        ]);
        kategori::create([
            'id_kategori' => 6,
            'kategori' => "Honorarium Pembimbing Tugas Akhir",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik dilampiri SK", 
        ]);
        kategori::create([
            'id_kategori' => 7,
            'kategori' => "Honorarium Penguji Tugas Akhir",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik dilampiri SK", 
        ]);
        kategori::create([
            'id_kategori' => 8,
            'kategori' => "Honorarium Mengajar Komponen Sekolah",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan dari SK diplampiri dengan rekap kehadiran", 
        ]);
        kategori::create([
            'id_kategori' => 9,
            'kategori' => "Honorarium Mengajar Komponen SKS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 10,
            'kategori' => "Honorarium Mengajar Komponen Gelar",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 11,
            'kategori' => "Honorarium Mengajar Komponen Jabatan Fungsional",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 12,
            'kategori' => "Honorarium Dosen Praktisi Komponen Gelar",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 13,
            'kategori' => "Honorarium Dosen Praktisi Komponen SKS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 14,
            'kategori' => "Honorarium Koreksi UTS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 15,
            'kategori' => "Honorarium Koreksi UAS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 16,
            'kategori' => "Honorarium Membuat Soal UTS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 17,
            'kategori' => "Honorarium Membuat Soal UAS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 18,
            'kategori' => "Honorarium Asesor Penilaian Karya Ilmiah",
            'obj_pembayaran' => "Dosen", 
        ]);
        kategori::create([
            'id_kategori' => 19,
            'kategori' => "IBK Dosen",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Vokasi", 
        ]);
        kategori::create([
            'id_kategori' => 20,
            'kategori' => "Dana Kegiatan Mahasiswa",
            'obj_pembayaran' => "Mahasiswa",
        ]);
        kategori::create([
            'id_kategori' => 21,
            'kategori' => "Honorarium Tim Jurnal",
            'obj_pembayaran' => "Dosen",
        ]);
        kategori::create([
            'id_kategori' => 22,
            'kategori' => "Honorarium Pembuatan Jurnal",
            'obj_pembayaran' => "Dosen",
        ]);
        kategori::create([
            'id_kategori' => 23,
            'kategori' => "Honorarium Asistensi",
            'obj_pembayaran' => "Mahasiswa dan Alumni",
        ]);
        kategori::create([
            'id_kategori' => 24,
            'kategori' => "Honorarium Tendik Paruh Waktu",
            'obj_pembayaran' => "Tendik Paruh Waktu",
        ]);
        kategori::create([
            'id_kategori' => 25,
            'kategori' => "IBK Tendik",
            'obj_pembayaran' => "Tendik Paruh Waktu",
            'deskripsi' => "Rekap dari Vokasi", 
        ]);
        kategori::create([
            'id_kategori' => 26,
            'kategori' => "Uang Makan non PNS",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "1. Rekap Presensi dari SDM
                            2. Formulir Pengajuan Uang Makan", 
        ]);
        kategori::create([
            'id_kategori' => 27,
            'kategori' => "Uang Makan PNS",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "Rekap Presensi dari SDM", 
        ]);
        kategori::create([
            'id_kategori' =>28,
            'kategori' => "Gaji Pokok Tendik non PNS",
            'obj_pembayaran' => "Tendik",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 29,
            'kategori' => "Kepesertaan",
            'obj_pembayaran' => "Dosen dan Tendik",
        ]);
        kategori::create([
            'id_kategori' => 30,
            'kategori' => "Sertifikasi",
            'obj_pembayaran' => "Dosen dan Tendik",
        ]);
        kategori::create([
            'id_kategori' => 31,
            'kategori' => "Pembayaran Pengadaan",
            'obj_pembayaran' => "Rekanan",
        ]);
        kategori::create([
            'id_kategori' => 32,
            'kategori' => "Pembayaran Sipinter",
            'obj_pembayaran' => "Rekanan",
        ]);
    }
}
