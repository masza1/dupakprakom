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
                'level_name' => 'Terampil',
            ),
            1 => 
            array (
                'id' => 2,
                'level_name' => 'Ahli',
            ),
        ));
        
        
    }
}