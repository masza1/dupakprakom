<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubElementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_elements')->delete();
        
        \DB::table('sub_elements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'element_id' => 1,
                'name' => 'A. Manajemen Layanan TI',
            ),
            1 => 
            array (
                'id' => 2,
                'element_id' => 1,
            'name' => 'B. Pengelolaan data (Data management)',
            ),
            2 => 
            array (
                'id' => 3,
                'element_id' => 1,
                'name' => 'C. Audit TI',
            ),
            3 => 
            array (
                'id' => 4,
                'element_id' => 2,
                'name' => 'A. Sistem Jaringan Komputer',
            ),
            4 => 
            array (
                'id' => 5,
                'element_id' => 2,
                'name' => 'B. Manajemen Infrastruktur TI',
            ),
            5 => 
            array (
                'id' => 6,
                'element_id' => 3,
                'name' => 'A. Sistem Informasi',
            ),
            6 => 
            array (
                'id' => 7,
                'element_id' => 3,
                'name' => 'B. Pengolahan Data',
            ),
            7 => 
            array (
                'id' => 8,
                'element_id' => 3,
                'name' => 'C. Area TI spesial/ khusus',
            ),
            8 => 
            array (
                'id' => 9,
                'element_id' => 4,
                'name' => 'A. Perolehan ijazah/gelar pendidikan formal sesuai dengan bidang tugas Jabatan Fungsional Pranata Komputer',
            ),
            9 => 
            array (
                'id' => 10,
                'element_id' => 4,
                'name' => 'B. Pembuatan Karya Tulis/Karya Ilmiah di bidang teknologi informasi berbasis komputer',
            ),
            10 => 
            array (
                'id' => 11,
                'element_id' => 4,
                'name' => 'C. Penerjemahan/Penyaduran Buku dan Bahan-Bahan Lain di bidang teknologi informasi berbasis komputer',
            ),
            11 => 
            array (
                'id' => 12,
                'element_id' => 4,
                'name' => 'D. Penyusunan Standar/Pedoman/Petunjuk Pelaksanaan/Petunjuk Teknis di bidang teknologi informasi berbasis komputer',
            ),
            12 => 
            array (
                'id' => 13,
                'element_id' => 4,
                'name' => 'E. Pengembangan Kompetensi di bidang teknologi informasi berbasis komputer',
            ),
            13 => 
            array (
                'id' => 14,
                'element_id' => 4,
                'name' => 'F. Kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina',
            ),
            14 => 
            array (
                'id' => 15,
                'element_id' => 5,
                'name' => 'A. Pengajar/Pelatih di bidang teknologi informasi berbasis komputer',
            ),
            15 => 
            array (
                'id' => 16,
                'element_id' => 5,
                'name' => 'B. Keanggotaan dalam Tim Penilai/ Tim Uji Kompetensi',
            ),
            16 => 
            array (
                'id' => 17,
                'element_id' => 5,
                'name' => 'C. Perolehan Penghargaan/tanda jasa',
            ),
            17 => 
            array (
                'id' => 18,
                'element_id' => 5,
                'name' => 'D. Perolehan Gelar Kesarjanaan Lainnya',
            ),
            18 => 
            array (
                'id' => 19,
                'element_id' => 5,
                'name' => 'E. Pelaksanaan tugas lain yang mendukung pelaksanaan tugas Pranata Komputer',
            ),
        ));
        
        
    }
}