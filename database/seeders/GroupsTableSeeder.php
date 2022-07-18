<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('groups')->delete();
        
        \DB::table('groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_name' => 'III.a',
                'rank' => 'Penata Muda',
            ),
            1 => 
            array (
                'id' => 2,
                'group_name' => 'III.b',
                'rank' => 'Penata Muda Tingkat I',
            ),
            2 => 
            array (
                'id' => 3,
                'group_name' => 'III.c',
                'rank' => 'Penata',
            ),
            3 => 
            array (
                'id' => 4,
                'group_name' => 'III.d',
                'rank' => 'Penata Tingkat I',
            ),
            4 => 
            array (
                'id' => 5,
                'group_name' => 'II.a',
                'rank' => 'Pengatur Muda',
            ),
            5 => 
            array (
                'id' => 6,
                'group_name' => 'II.b',
                'rank' => 'Pengatur Muda Tingkat I',
            ),
            6 => 
            array (
                'id' => 7,
                'group_name' => 'II.c',
                'rank' => 'Pengatur',
            ),
            7 => 
            array (
                'id' => 8,
                'group_name' => 'II.d',
                'rank' => 'Pengatur Tingkat I',
            ),
        ));
        
        
    }
}