<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('positions')->delete();
        
        \DB::table('positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_id' => 7,
                'position_name' => 'Pranata Komputer Terampil',
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => 5,
                'position_name' => 'Pranata Komputer Mahir',
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => 2,
                'position_name' => 'Pranata Komputer Penyelia',
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => 1,
                'position_name' => 'Pranata Komputer Pemula',
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => 3,
                'position_name' => 'Pranata Komputer Pelaksana',
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => 4,
                'position_name' => 'Pranata Komputer Madya',
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => 6,
                'position_name' => 'Pranata Komputer Utama',
            ),
        ));
        
        
    }
}