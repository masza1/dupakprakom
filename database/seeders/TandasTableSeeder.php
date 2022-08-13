<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TandasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tandas')->delete();
        
        \DB::table('tandas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nip' => '197009261990031005',
                'name' => 'ANDJAR SURJADIANTO, S.Sos. CGAE.',
                'jabatan' => 'Pembina Utama Muda',
                'created_at' => '2022-08-13 01:03:13',
                'updated_at' => '2022-08-13 01:03:13',
            ),
        ));
        
        
    }
}