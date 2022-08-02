<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PenActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pen_activities')->delete();
        
        \DB::table('pen_activities')->insert(array (
            0 => 
            array (
                'id' => 3,
                'description' => 'Memperoleh ijazah sesuai dengan bidang tugas Jabatan Fungsional Pranata Komputer',
                'output' => 'Ijazah/Gelar',
                'credit' => '0.25',
                'element_id' => 4,
                'sub_element_id' => 9,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            1 => 
            array (
                'id' => 4,
                'description' => '1.a. Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/survei/evaluasi di bidang teknologi informasi berbasis komputeryang dipublikasikan dalam bentuk buku/majalah ilmiah internasional yang diterbitkan internasional yang terindek',
                'output' => 'Jurnal/Buku',
                'credit' => '20.00',
                'element_id' => 4,
                'sub_element_id' => 10,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            2 => 
            array (
                'id' => 5,
                'description' => '1. b. Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/survei/evaluasi di bidang teknologi informasi berbasis komputeryang dipublikasikan dalam bentuk buku/majalah ilmiah internasional yang diterbitkan nasional',
                'output' => 'Jurnal/Buku',
                'credit' => '12.50',
                'element_id' => 4,
                'sub_element_id' => 10,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            3 => 
            array (
                'id' => 6,
                'description' => '1.c. Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/survei/evaluasi di bidang teknologi informasi berbasis komputeryang dipublikasikan dalam bentuk buku/majalah ilmiah internasional yang diterbitkan dan diakui oleh organisasi profesi dan Instansi Pembina',
                'output' => 'Jurnal/Buku/Naskah',
                'credit' => '6.00',
                'element_id' => 4,
                'sub_element_id' => 10,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            4 => 
            array (
                'id' => 7,
                'description' => '2. a. Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/survei/evaluasi di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan dalam bentuk buku',
                'output' => 'Buku',
                'credit' => '8.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            5 => 
            array (
                'id' => 8,
                'description' => '2. b. Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/survei/evaluasi di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan dalam bentuk makalah',
                'output' => 'Makalah',
                'credit' => '4.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            6 => 
            array (
                'id' => 9,
                'description' => '3. a. Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi berbasis komputer yang dipublikasikan dalam bentuk buku yang diterbitkan dan diedarkan secara nasional',
                'output' => 'Buku',
                'credit' => '8.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            7 => 
            array (
                'id' => 10,
                'description' => '3. b. Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi berbasis komputer yang dipublikasikan dalam majalah ilmiah yang diakui oleh organisasi profesi dan Instansi Pembina',
                'output' => 'Naskah',
                'credit' => '4.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            8 => 
            array (
                'id' => 11,
                'description' => '4. a. Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan dalam bentuk buku',
                'output' => 'Buku',
                'credit' => '7.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            9 => 
            array (
                'id' => 12,
                'description' => '4. b. Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan dalam bentuk makalah',
                'output' => 'Makalah',
                'credit' => '3.50',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            10 => 
            array (
                'id' => 13,
                'description' => '5. Menyampaikan prasaran berupa tinjauan, gagasan dan atau ulasan ilmiah dalam pertemuan ilmiah',
                'output' => 'Naskah',
                'credit' => '2.50',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            11 => 
            array (
                'id' => 14,
                'description' => '6. Membuat artikel di bidang teknologi informasi berbasis komputer yang dipublikasikan',
                'output' => 'Artikel',
                'credit' => '2.00',
                'element_id' => 4,
                'sub_element_id' => 11,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            12 => 
            array (
                'id' => 15,
                'description' => '1. a. Menerjemahkan/menyadur buku atau karya ilmiah di bidang teknologi informasi berbasis komputer yang dipublikasikan: dalam bentuk buku yang diterbitkan dan diedarkan secara nasional',
                'output' => 'Buku',
                'credit' => '7.00',
                'element_id' => 4,
                'sub_element_id' => 12,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            13 => 
            array (
                'id' => 16,
                'description' => '1. b. Menerjemahkan/menyadur buku atau karya ilmiah di bidang teknologi informasi berbasis komputer yang dipublikasikan: dalam majalah ilmiah yang diakui oleh organisasi profesi dan Instansi Pembina',
                'output' => 'Naskah',
                'credit' => '3.50',
                'element_id' => 4,
                'sub_element_id' => 13,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            14 => 
            array (
                'id' => 17,
                'description' => '2. a. Menerjemahkan/menyadur buku atau karya ilmiah di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan: dalam bentuk buku',
                'output' => 'Buku',
                'credit' => '3.00',
                'element_id' => 4,
                'sub_element_id' => 12,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            15 => 
            array (
                'id' => 18,
                'description' => '2. b.Menerjemahkan/menyadur buku atau karya ilmiah di bidang teknologi informasi berbasis komputer yang tidak dipublikasikan: dalam bentuk makalah',
                'output' => 'Makalah',
                'credit' => '1.50',
                'element_id' => 4,
                'sub_element_id' => 13,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            16 => 
            array (
                'id' => 19,
                'description' => 'Membuat buku standar/pedoman/ petunjuk pelaksanaan/ petunjuk teknis di bidang teknologi informasi berbasis komputer',
                'output' => 'Buku',
                'credit' => '3.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            17 => 
            array (
                'id' => 20,
                'description' => '1. Mengikuti kegiatan pengembangan kompetensi: Pelatihan fungsional',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.50',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            18 => 
            array (
                'id' => 21,
                'description' => '2. Mengikuti kegiatan pengembangan kompetensi: seminar/lokakarya/konferensi/simposium/studi banding-lapangan',
                'output' => 'Sertifikat/Laporan',
                'credit' => '3.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            19 => 
            array (
                'id' => 22,
                'description' => '3. a. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya lebih dari 960 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '15.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            20 => 
            array (
                'id' => 23,
                'description' => '3. b. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 641 - 960 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '9.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            21 => 
            array (
                'id' => 24,
                'description' => '3. c. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat  Lamanya antara 481 - 640 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '6.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            22 => 
            array (
                'id' => 25,
                'description' => '3. d. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 161 - 480 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '3.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            23 => 
            array (
                'id' => 26,
                'description' => '3. e. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 81 - 160 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '2.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            24 => 
            array (
                'id' => 27,
                'description' => '3. f. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat  Lamanya antara 30 - 80 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '1.00',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            25 => 
            array (
                'id' => 28,
                'description' => '3. g. pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya kurang dari 30 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.50',
                'element_id' => 4,
                'sub_element_id' => 14,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            26 => 
            array (
                'id' => 29,
                'description' => '4. a. pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya lebih dari 960 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '7.50',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            27 => 
            array (
                'id' => 30,
                'description' => '4.b.pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 641 - 960 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '4.50',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            28 => 
            array (
                'id' => 31,
                'description' => '4. c. pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 481 - 640 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '3.00',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            29 => 
            array (
                'id' => 32,
                'description' => '4. d.  pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 161 - 480 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '1.50',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            30 => 
            array (
                'id' => 33,
                'description' => '4. e. pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 81 - 160 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '1.00',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            31 => 
            array (
                'id' => 34,
                'description' => '4. f.  pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat Lamanya antara 30 - 80 jam',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.50',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            32 => 
            array (
                'id' => 35,
                'description' => '4. g. pelatihan manajerial/sosial kultural di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.25',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            33 => 
            array (
                'id' => 36,
            'description' => '5. maintain performance (pemeliharaan kinerja dan target kinerja)',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.50',
                'element_id' => 4,
                'sub_element_id' => 15,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            34 => 
            array (
                'id' => 37,
                'description' => 'Melaksanakan kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina di bidang teknologi informasi berbasis komputer',
                'output' => 'Laporan',
                'credit' => '0.50',
                'element_id' => 5,
                'sub_element_id' => 16,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            35 => 
            array (
                'id' => 38,
                'description' => 'Mengajar/melatih/membimbing yang berkaitan dengan bidang teknologi informasi berbasis komputer',
                'output' => 'Sertifikat/Laporan',
                'credit' => '0.40',
                'element_id' => 5,
                'sub_element_id' => 16,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            36 => 
            array (
                'id' => 39,
                'description' => 'Menjadi anggota Tim Penilai/Tim Uji Kompetensi',
                'output' => 'Laporan',
                'credit' => '0.04',
                'element_id' => 5,
                'sub_element_id' => 16,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            37 => 
            array (
                'id' => 40,
            'description' => '1. a. Memperoleh penghargaan/tanda jasa Satya Lancana Karya Satya : 30 (tiga puluh) tahun',
                'output' => 'Piagam',
                'credit' => '3.00',
                'element_id' => 5,
                'sub_element_id' => 17,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            38 => 
            array (
                'id' => 41,
            'description' => '1. b. Memperoleh penghargaan/tanda jasa Satya Lancana Karya Satya : 20 (tiga puluh) tahun',
                'output' => 'Piagam',
                'credit' => '2.00',
                'element_id' => 5,
                'sub_element_id' => 17,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            39 => 
            array (
                'id' => 42,
            'description' => '1. c. Memperoleh penghargaan/tanda jasa Satya Lancana Karya Satya : 10 (tiga puluh) tahun',
                'output' => 'Piagam',
                'credit' => '1.00',
                'element_id' => 5,
                'sub_element_id' => 17,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            40 => 
            array (
                'id' => 43,
                'description' => '2. a. Penghargaan/tanda jasa atas prestasi kerjanya Tingkat Internasional',
                'output' => 'Sertifikat/Piagam',
                'credit' => '0.35',
                'element_id' => 5,
                'sub_element_id' => 18,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            41 => 
            array (
                'id' => 44,
                'description' => '2. b. Penghargaan/tanda jasa atas prestasi kerjanya Tingkat Nasional',
                'output' => 'Sertifikat/Piagam',
                'credit' => '0.25',
                'element_id' => 5,
                'sub_element_id' => 18,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            42 => 
            array (
                'id' => 45,
                'description' => '2. c. Penghargaan/tanda jasa atas prestasi kerjanya Tingkat Provinsi',
                'output' => 'Sertifikat/Piagam',
                'credit' => '0.15',
                'element_id' => 5,
                'sub_element_id' => 18,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            43 => 
            array (
                'id' => 46,
                'description' => 'a. Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Pranata Komputer Diploma tiga',
                'output' => 'Ijazah',
                'credit' => '4.00',
                'element_id' => 5,
                'sub_element_id' => 19,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            44 => 
            array (
                'id' => 47,
                'description' => 'b. Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Pranata Komputer Sarjana atau Diploma empat',
                'output' => 'Ijazah',
                'credit' => '5.00',
                'element_id' => 5,
                'sub_element_id' => 19,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            45 => 
            array (
                'id' => 48,
                'description' => 'c. Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Pranata Komputer Magister',
                'output' => 'Ijazah',
                'credit' => '10.00',
                'element_id' => 5,
                'sub_element_id' => 19,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            46 => 
            array (
                'id' => 49,
                'description' => 'd.  Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Pranata Komputer Doktor',
                'output' => 'Ijazah',
                'credit' => '15.00',
                'element_id' => 5,
                'sub_element_id' => 19,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
            47 => 
            array (
                'id' => 50,
                'description' => 'Melakukan kegiatan yang mendukung pelaksanaan tugas Pranata Komputer',
                'output' => 'Laporan',
                'credit' => '0.04',
                'element_id' => 5,
                'sub_element_id' => 19,
                'created_at' => '2022-07-04 06:09:20',
                'updated_at' => '2022-07-04 06:09:20',
            ),
        ));
        
        
    }
}