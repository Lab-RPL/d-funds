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
            'nama_kategori' => "Kunjungan",
            'obj_pembayaran' => "Rekanan",
            'deskripsi' => "1a. Kwitansi Bus / Transport Sewa
1b. Foto STNK
1c. Foto Bus dari depan, dalam, dan belakang
2. Kwitansi Penginapan
3. Kwitansi Transport Lokal (Grab, Gojek, dll)"

        ]);
        kategori::create([
            'id_kategori' => 2,
            'nama_kategori' => "Biaya Perjalanan Dinas",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "1. Surat Tugas
2. SPPD dan Lampiran berstempel
3. Tiket Pesawat / Kereta dan Boarding Pass
4. Kwitansi Penginapan
5. Laporan Kegitan (lampiran foto)"
        ]);
        kategori::create([
            'id_kategori' => 3,
            'nama_kategori' => "Honorarium Narsum",
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
            'nama_kategori' => "Tunjangan Struktural",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "Formulir pengajuan dilampiri SK untuk pejabat baru", 
        ]);
        kategori::create([
            'id_kategori' => 5,
            'nama_kategori' => "Tunjangan Fungsional",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir pengajuan dilampiri SK untuk pejabat baru", 
        ]);
        kategori::create([
            'id_kategori' => 6,
            'nama_kategori' => "Honorarium Pembimbing Tugas Akhir",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik dilampiri SK", 
        ]);
        kategori::create([
            'id_kategori' => 7,
            'nama_kategori' => "Honorarium Penguji Tugas Akhir",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik dilampiri SK", 
        ]);
        kategori::create([
            'id_kategori' => 8,
            'nama_kategori' => "Honorarium Mengajar Komponen Sekolah",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan dari SK diplampiri dengan rekap kehadiran", 
        ]);
        kategori::create([
            'id_kategori' => 9,
            'nama_kategori' => "Honorarium Mengajar Komponen SKS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 10,
            'nama_kategori' => "Honorarium Mengajar Komponen Gelar",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 11,
            'nama_kategori' => "Honorarium Mengajar Komponen Jabatan Fungsional",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 12,
            'nama_kategori' => "Honorarium Dosen Praktisi Komponen Gelar",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 13,
            'nama_kategori' => "Honorarium Dosen Praktisi Komponen SKS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 14,
            'nama_kategori' => "Honorarium Koreksi UTS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 15,
            'nama_kategori' => "Honorarium Koreksi UAS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 16,
            'nama_kategori' => "Honorarium Membuat Soal UTS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 17,
            'nama_kategori' => "Honorarium Membuat Soal UAS",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Akademik", 
        ]);
        kategori::create([
            'id_kategori' => 18,
            'nama_kategori' => "Honorarium Asesor Penilaian Karya Ilmiah",
            'obj_pembayaran' => "Dosen", 
        ]);
        kategori::create([
            'id_kategori' => 19,
            'nama_kategori' => "IBK Dosen",
            'obj_pembayaran' => "Dosen",
            'deskripsi' => "Rekap dari Vokasi", 
        ]);
        kategori::create([
            'id_kategori' => 20,
            'nama_kategori' => "Dana Kegiatan Mahasiswa",
            'obj_pembayaran' => "Mahasiswa",
        ]);
        kategori::create([
            'id_kategori' => 21,
            'nama_kategori' => "Honorarium Tim Jurnal",
            'obj_pembayaran' => "Dosen",
        ]);
        kategori::create([
            'id_kategori' => 22,
            'nama_kategori' => "Honorarium Pembuatan Jurnal",
            'obj_pembayaran' => "Dosen",
        ]);
        kategori::create([
            'id_kategori' => 23,
            'nama_kategori' => "Honorarium Asistensi",
            'obj_pembayaran' => "Mahasiswa dan Alumni",
        ]);
        kategori::create([
            'id_kategori' => 24,
            'nama_kategori' => "Honorarium Tendik Paruh Waktu",
            'obj_pembayaran' => "Tendik Paruh Waktu",
        ]);
        kategori::create([
            'id_kategori' => 25,
            'nama_kategori' => "IBK Tendik",
            'obj_pembayaran' => "Tendik Paruh Waktu",
            'deskripsi' => "Rekap dari Vokasi", 
        ]);
        kategori::create([
            'id_kategori' => 26,
            'nama_kategori' => "Uang Makan non PNS",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "1. Rekap Presensi dari SDM
2. Formulir Pengajuan Uang Makan", 
        ]);
        kategori::create([
            'id_kategori' => 27,
            'nama_kategori' => "Uang Makan PNS",
            'obj_pembayaran' => "Dosen dan Tendik",
            'deskripsi' => "Rekap Presensi dari SDM", 
        ]);
        kategori::create([
            'id_kategori' =>28,
            'nama_kategori' => "Gaji Pokok Tendik non PNS",
            'obj_pembayaran' => "Tendik",
            'deskripsi' => "Formulir Pengajuan", 
        ]);
        kategori::create([
            'id_kategori' => 29,
            'nama_kategori' => "Kepesertaan",
            'obj_pembayaran' => "Dosen dan Tendik",
        ]);
        kategori::create([
            'id_kategori' => 30,
            'nama_kategori' => "Sertifikasi",
            'obj_pembayaran' => "Dosen dan Tendik",
        ]);
        kategori::create([
            'id_kategori' => 31,
            'nama_kategori' => "Pembayaran Pengadaan",
            'obj_pembayaran' => "Rekanan",
        ]);
        kategori::create([
            'id_kategori' => 32,
            'nama_kategori' => "Pembayaran Sipinter",
            'obj_pembayaran' => "Rekanan",
        ]);
    }
}
