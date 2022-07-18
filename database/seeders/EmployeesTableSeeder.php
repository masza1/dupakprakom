<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employees')->delete();
        
        \DB::table('employees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 9,
                'nip' => 123456789,
                'name' => 'Penilai Satu',
                'group_id' => 5,
                'position_id' => 5,
                'unit_id' => 2,
                'birthplace' => 'sidoarjo',
                'birthdate' => '2022-06-26',
                'gender' => 'L',
                'level' => 'Ahli',
                'created_at' => '2022-06-26 07:19:11',
                'updated_at' => '2022-06-26 07:19:17',
            ),
            1 => 
            array (
                'id' => 6,
                'user_id' => 14,
                'nip' => 14,
                'name' => 'Eleanor Franklin',
                'group_id' => 3,
                'position_id' => 6,
                'unit_id' => 6,
                'birthplace' => 'Id qui mollitia corp',
                'birthdate' => '2012-11-10',
                'gender' => 'P',
                'level' => 'Ahli',
                'created_at' => '2022-06-26 04:18:52',
                'updated_at' => '2022-06-26 04:18:52',
            ),
        ));
        
        
    }
}