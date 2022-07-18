<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_name' => 'Pemula',
            ),
            1 => 
            array (
                'id' => 2,
                'level_name' => 'Penyelia',
            ),
            2 => 
            array (
                'id' => 3,
                'level_name' => 'Pelaksana',
            ),
            3 => 
            array (
                'id' => 4,
                'level_name' => 'Madya',
            ),
            4 => 
            array (
                'id' => 5,
                'level_name' => 'Mahir',
            ),
            5 => 
            array (
                'id' => 6,
                'level_name' => 'Utama',
            ),
            6 => 
            array (
                'id' => 7,
                'level_name' => 'Terampil',
            ),
        ));
        
        
    }
}