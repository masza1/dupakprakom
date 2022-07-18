<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('elements')->delete();
        
        \DB::table('elements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'I. Tata Kelola dan Tata Laksana Teknologi Informasi',
                'type' => 'TUGAS',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'II. Infrastruktur Teknologi Informasi',
                'type' => 'TUGAS',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'III. Sistem Informasi dan Multimedia',
                'type' => 'TUGAS',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'I. Pengembangan Profesi',
                'type' => 'PPP',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'II. Penunjang Kegiatan teknologi informasi berbasis komputer',
                'type' => 'PPP',
            ),
        ));
        
        
    }
}