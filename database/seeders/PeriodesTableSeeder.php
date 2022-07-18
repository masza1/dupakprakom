<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodes')->delete();
        
        \DB::table('periodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'semester' => 'Semester 2',
                'start_date' => '2022-06-25',
                'end_date' => '2022-06-30',
                'year' => 2022,
                'created_at' => '2022-06-26 04:15:25',
                'updated_at' => '2022-06-26 04:27:41',
            ),
        ));
        
        
    }
}