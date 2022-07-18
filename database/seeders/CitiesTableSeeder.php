<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'KAB. PACITAN',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'KAB. PONOROGO',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'KAB. TRENGGALEK',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'KAB. TULUNGAGUNG',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'KAB. BLITAR',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'KAB. KEDIRI',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'KAB. MALANG',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'KAB. LUMAJANG',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'KAB. JEMBER',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'KAB. BANYUWANGI',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'KAB. BONDOWOSO',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'KAB. SITUBONDO',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'KAB. PROBOLINGGO',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'KAB. PASURUAN',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'KAB. SIDOARJO',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'KAB. MOJOKERTO',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'KAB. JOMBANG',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'KAB. NGANJUK',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'KAB. MADIUN',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'KAB. MAGETAN',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'KAB. NGAWI',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'KAB. BOJONEGORO',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'KAB. TUBAN',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'KAB. LAMONGAN',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'KAB. GRESIK',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'KAB. BANGKALAN',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'KAB. SAMPANG',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'KAB. PAMEKASAN',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'KAB. SUMENEP',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'KOTA KEDIRI',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'KOTA BLITAR',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'KOTA MALANG',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'KOTA PROBOLINGGO',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'KOTA PASURUAN',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'KOTA MOJOKERTO',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'KOTA MADIUN',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'KOTA SURABAYA',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'KOTA BATU',
            ),
        ));
        
        
    }
}