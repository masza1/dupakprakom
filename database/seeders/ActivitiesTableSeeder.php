<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activities')->delete();
        
        \DB::table('activities')->insert([
            [
                'description' => '1. Melakukan pemenuhan permintaan dan layanan teknologi informasi',
                'output' => 'Laporan pemenuhan permintaan layanan TI',
                'credit' => '0.15',
                'element_id' => 3,
                'sub_element_id' => 6,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Melakukan pengumpulan informasi mengenai data instansi',
                'output' => 'Kebutuhan data strategis organisasi/instansi',
                'credit' => '0.55',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Melakukan pengadministrasian kegiatan tata kelola data',
                'output' => 'Agenda, catatan, jadwal, artefak dari organisasi tata kelola data',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '3. Melakukan pencatatan permasalahan pengelolaan data',
                'output' => 'Catatan issue /permasalahan pengelolaan data',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '4. Melakukan perawatan arsitektur teknologi data',
                'output' => 'Dokumen mekanisme pemeliharaan arsitektur data-teknologi',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '5. Melakukan perawatan arsitektur integrasi data',
                'output' => 'Dokumen mekanisme pemeliharaan arsitektur data terintegrasi',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '6. Melakukan perawatan data model',
                'output' => 'Dokumen mekanisme pemeliharaan data model',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '7. Melakukan perawatan business intelligence',
                'output' => 'Laporan perawatan implementasi business intelligence',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '8. Melakukan perawatan taksonomi data di suatu instansi',
                'output' => 'Laporan mekanisme pemeliharaan taksonomi organisasi, standar manajemen konten, XML',
                'credit' => '0.28',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '9. Melakukan perawatan arsitektur data',
                'output' => 'Laporan mekanisme pemeliharaan arsitektur metadata',
                'credit' => '0.28',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '10. Mengembangkan data model',
                'output' => 'Laporan dan diagram model data konseptual, logis, dan fisik',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '11. Melakukan perancangan data model sederhana',
                'output' => 'Spesifikasi data definition language',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '12. Melakukan uji coba rancangan layanan akses data',
                'output' => 'Laporan uji coba',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '13. Melakukan perancangan visualisasi informasi sederhana',
                'output' => 'Dokumen proses rancangan visualisasi, tampilan aplikasi, laporan',
                'credit' => '0.22',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '14. Melakukan uji coba rancangan visualisasi informasi',
                'output' => 'Laporan uji coba',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '15. Melakukan penyiapan data uji coba rancangan database',
                'output' => 'Basis data yang di uji, data yang diuji',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '16. Melakukan uji coba rancangan layanan integrasi data',
                'output' => 'Laporan uji coba',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '17. Melakukan uji coba prosedur validasi kebutuhan informasi',
                'output' => 'SOP pengujian, laporan hasil uji prosedur',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '18. Melakukan instalasi/updating DBMS',
                'output' => 'Pemeliharaan lingkungan basis data produksi, perubahan terkelola ke basis data produksi, rilis, laporan instalasi',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '19. Melakukan penggandaan data',
                'output' => 'Laporan penggandaan data dan surat tugas',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '20. Melakukan pemantauan (monitoring) kinerja database',
                'output' => 'Laporan hasil pemantauan',
                'credit' => '0.01',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '21. Melakukan pengarsipan, pencarian kembali (retrieve ], atau penghapusan data (purge )',
                'output' => 'Daftar data yang diarsipkan, daftar data yang diambil, daftar data yang dihapus',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '22. Melakukan implementasi teknologi data',
                'output' => 'Teknologi data yang diinstal, laporan instalasi',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '23. Memberikan support pemecahan masalah teknologi data',
                'output' => 'Rekomendasi pemecahan masalah teknologi data',
                'credit' => '0.03',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '24. Melakukan implementasi data warehouse',
                'output' => 'Laporan implementasi data warehouse',
                'credit' => '0.76',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '25. Melakukan pemantauan (monitoring ) autentifikasi atau perilaku akses pengguna',
                'output' => 'Laporan hasil pemantauan',
                'credit' => '0.13',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '26. Melakukan registrasi permasalahan kualitas data',
                'output' => 'Daftar log permasalahan kualitas data',
                'credit' => '0.23',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '27. Melakukan pemantauan (monitoring ) implementasi prosedur pengelolaan kualitas data',
                'output' => 'Laporan hasil pemantauan',
                'credit' => '0.23',
                'element_id' => 3,
                'sub_element_id' => 7,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Melakukan pengumpulan informasi dasar untuk kebutuhan audit TI',
                'output' => 'Dokumen informasi dasar objek audit',
                'credit' => '0.38',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Melakukan pengumpulan dokumen untuk kebutuhan audit TI',
                'output' => 'Hasil pengumpulan data',
                'credit' => '0.73',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '1. Melakukan analisis kebutuhan pengguna sistem jaringan komputer lokal (Local Area Network)',
                'output' => 'Dokumen hasil analisis',
                'credit' => '0.60',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '2. Melakukan analisis kondisi sistem jaringan komputer lokal (Local Area Network ) yang sedang berjalan',
                'output' => 'Dokumen hasil analisis',
                'credit' => '0.34',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '3. Menerapkan rancangan logis sistem jaringan komputer lokal (Local Area Network )',
                'output' => 'Dokumen implementasi sistem jaringan komputer lokal',
                'credit' => '0.22',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '4. Menerapkan rancangan fisik sistem jaringan komputer lokal (Local Area Network )',
                'output' => 'Dokumen implementasi sistem jaringan komputer',
                'credit' => '0.54',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '5. Menerapkan rancangan logis sistem pengamanan jaringan komputer lokal (Local Area Network )',
                'output' => 'Dokumen implementasi keamanan sistem jaringan komputer',
                'credit' => '0.17',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '6. Menyusun rancangan uji coba sistem jaringan lokal (Local Area Network )',
                'output' => 'Dokumen rancangan uji coba',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '7. Melakukan uji coba sistem jaringan komputer lokal (Local Area Network )',
                'output' => 'Laporan uji coba',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '8. Melakukan pemantauan (monitoring ) jaringan',
                'output' => 'Laporan hasil pemantauan',
                'credit' => '0.02',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '9. Melakukan deteksi dan atau perbaikan terhadap permasalahan yang terjadi pada sistem jaringan lokal (Local Area Network )',
                'output' => 'Dokumen hasil pendeteksian dan atau perbaikan kerusakan peralatan sistem jaringan komputer',
                'credit' => '0.01',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '10. Menyusun pedoman operasional sistem jaringan komputer dan keamanan jaringan',
                'output' => 'Buku pedoman operasional, panduan pengguna',
                'credit' => '1.69',
                'element_id' => 3,
                'sub_element_id' => 8,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Melakukan pemeriksaan kesesuaian antara perangkat TI End User dengan spesifikasi teknis',
            'output' => 'Dokumen hasil pemeriksaan (User Acceptance Test dan Acceptance Test Procedure )',
                'credit' => '0.23',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Melakukan pencatatan infrastruktur TI',
                'output' => 'Dokumen inventaris',
                'credit' => '0.21',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '3. Melakukan pengujian perangkat TI End User',
            'output' => 'Dokumen hasil pengujian (User Acceptance Test )',
                'credit' => '0.23',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '4. Melakukan pemasangan kabel untuk infrastruktur TI',
                'output' => 'Dokumen hasil pemasangan',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '5. Menyusun rencana pemeliharaan perangkat TI End User',
                'output' => 'Dokumentasi rencana pemeliharaan perangkat TI End User',
                'credit' => '0.10',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '6. Melakukan pemeliharaan perangkat TI End User',
                'output' => 'Dokumen kegiatan perawatan',
                'credit' => '0.12',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '7. Melakukan pemasangan perangkat fisik TI',
                'output' => 'Dokumen hasil pemasangan perangkat keamanan fisik TI',
                'credit' => '0.17',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
            'description' => '8. Melakukan pemantauan (monitoring ) kinerja infrastruktur TI',
                'output' => 'Laporan hasil pemantauan',
                'credit' => '0.06',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '9. Melakukan deteksi dan atau perbaikan terhadap permasalahan perangkat TI End User',
                'output' => 'Dokumen hasil pendeteksian dan atau perbaikan kerusakan peralatan perangkat TI End User',
                'credit' => '0.05',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '10. Melakukan instalasi/upgrade sistem operasi komputer/perangkat lunak pada infrastruktur TI',
                'output' => 'Laporan pelaksanaan instalasi/upgrade',
                'credit' => '0.04',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Menyusun petunjuk operasional program aplikasi',
                'output' => 'Buku petunjuk pengoperasian sistem',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Menyusun dokumentasi pengembangan sistem informasi',
                'output' => 'Kompilasi dokumen',
                'credit' => '0.03',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '3. Melakukan analisis kebutuhan program aplikasi',
                'output' => 'Jumlah dokumen yang dikerjakan dan keterangan kecepatan scanner',
                'credit' => '0.03',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '4. Membuat program aplikasi',
                'output' => 'Laporan perekaman data',
                'credit' => '0.55',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '5. Mengembangkan dan atau meremajakan program aplikasi',
                'output' => 'Laporan perekaman data',
                'credit' => '0.28',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '6. Melakukan uji coba program aplikasi',
                'output' => 'Laporan perekaman data',
                'credit' => '0.17',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Melakukan perekaman data dengan pemindaian',
                'output' => 'Laporan manipulasi data',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Melakukan perekaman data tanpa validasi',
                'output' => 'Laporan konversi data',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '3. Melakukan validasi hasil perekaman data',
                'output' => 'Laporan kompilasi',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '4. Melakukan perekaman data dengan validasi',
                'output' => 'Laporan hasil perekaman data spasial',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '5. Membuat query sederhana',
                'output' => 'Dokumentasi tahapan kegiatan, quick look , dan penjelasan penggunaan peta tematik',
                'credit' => '0.09',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '6. Melakukan konversi data',
                'output' => 'Laporan hasil pengolahan peta',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '7. Melakukan kompilasi data pengolahan',
                'output' => 'Laporan hasil editing data spasial',
                'credit' => '0.04',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '1. Melakukan perekaman data spasial',
                'output' => 'Laporan hasil pemeriksaan',
                'credit' => '0.00',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '2. Membuat peta tematik sederhana',
                'output' => 'Hasil desain grafis',
                'credit' => '0.02',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '3. Melakukan pengolahan data atribut dan spasial sederhana',
                'output' => 'Dokumentasi berupa perubahan pemrograman multimedia',
                'credit' => '0.04',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '4. Melakukan editing data spasial',
                'output' => 'Dokumentasi objek',
                'credit' => '0.02',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '5. Melakukan verifikasi data spasial',
                'output' => 'Dokumentasi tahapan prototype',
                'credit' => '0.11',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '6. Membuat desain grafis',
                'output' => 'Dokumentasi pemrograman',
                'credit' => '0.02',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 3,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '7. Melakukan editing objek multimedia sederhana dengan piranti lunak',
                'output' => 'Laporan uji coba program',
                'credit' => '0.26',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '8. Membuat objek multimedia sederhana dengan piranti lunak',
                'output' => 'Dokumen hasil analisis',
                'credit' => '0.69',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '9. Membuat prototype sederhana pada program multimedia',
                'output' => 'Source code , spesifikasi program aplikasi, screen capture , penjelasan fungsi modul/object',
                'credit' => '0.22',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '10. Membuat program multimedia sederhana',
                'output' => 'Dokumentasi pengembangan/peremajaan program aplikasi lama dan baru',
                'credit' => '0.44',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 4,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
            [
                'description' => '11. Melakukan uji coba program multimedia interaktif',
                'output' => 'Laporan uji coba program',
                'credit' => '0.02',
                'element_id' => 3,
                'sub_element_id' => 9,
                'position_id' => 2,
                'level_id' => 1,
                'created_at' => '2022-07-04 06:03:30',
                'updated_at' => '2022-07-04 06:03:30',
            ],
        ]);
        
        
    }
}