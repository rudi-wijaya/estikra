<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subjek' => 'Pertanyaan Mengenai PPDB',
            'pesan' => 'Assalamu\'alaikum, Saya ingin mengetahui informasi lengkap mengenai Penerimaan Peserta Didik Baru tahun ajaran 2026/2027. Berapa jumlah kuota yang tersedia dan kapan tanggal pendaftaran dibuka?',
            'status' => 'belum dibaca',
        ]);

        Message::create([
            'nama' => 'Siti Rahma',
            'email' => 'siti.rahma@email.com',
            'subjek' => 'Pengaduan Fasilitas Sekolah',
            'pesan' => 'Saya ingin melaporkan bahwa toilet siswa di lantai 2 memiliki masalah pada pipa air. Mohon untuk segera diperbaiki. Terima kasih.',
            'status' => 'sudah dibaca',
        ]);

        Message::create([
            'nama' => 'Andi Wijaya',
            'email' => 'andi.w@gmail.com',
            'subjek' => 'Apresiasi Kegiatan Sekolah',
            'pesan' => 'Halo, saya ingin mengucapkan terima kasih kepada pihak sekolah atas penyelenggaraan acara pentas seni bulan lalu. Anak saya sangat senang berpartisipasi dan mendapatkan pengalaman yang berharga.',
            'status' => 'belum dibaca',
        ]);

        Message::create([
            'nama' => 'Mas\'ud Hermanto',
            'email' => 'masud.hermanto@yahoo.com',
            'subjek' => 'Inquiry: Program Ekstrakurikuler',
            'pesan' => 'Putra saya tertarik mengikuti kegiatan pramuka. Dapatkah saya mendapatkan informasi jadwal latihan dan biaya pendaftaran?',
            'status' => 'sudah dibaca',
        ]);

        Message::create([
            'nama' => 'Dina Kusuma',
            'email' => 'dina.kusuma@email.com',
            'subjek' => 'Saran Peningkatan Sarana Dan Prasarana',
            'pesan' => 'Salam, saya ingin memberikan saran untuk menambahkan area taman bermain yang lebih aman dan lengkap untuk siswa. Ini akan meningkatkan kualitas pembelajaran dan kesejahteraan siswa.',
            'status' => 'belum dibaca',
        ]);
    }
}
