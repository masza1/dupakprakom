<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'unit_name' => 'BADAN KEPEGAWAIAN DAERAH',
            ),
            1 => 
            array (
                'id' => 2,
                'unit_name' => 'BADAN PELAYANAN PAJAK DAERAH',
            ),
            2 => 
            array (
                'id' => 3,
                'unit_name' => 'BAGIAN ORGANISASI, SEKRETARIAT DAERAH',
            ),
            3 => 
            array (
                'id' => 4,
                'unit_name' => 'KECAMATAN TAMAN',
            ),
            4 => 
            array (
                'id' => 5,
                'unit_name' => 'KECAMATAN GEDANGAN',
            ),
            5 => 
            array (
                'id' => 6,
                'unit_name' => 'KECAMATAN SIDOARJO',
            ),
            6 => 
            array (
                'id' => 7,
                'unit_name' => 'KECAMATAN CANDI',
            ),
            7 => 
            array (
                'id' => 8,
                'unit_name' => 'KECAMATAN TANGGULANGIN',
            ),
            8 => 
            array (
                'id' => 9,
                'unit_name' => 'KECAMATAN PORONG',
            ),
            9 => 
            array (
                'id' => 10,
                'unit_name' => 'KECAMATAN JABON',
            ),
            10 => 
            array (
                'id' => 11,
                'unit_name' => 'KECAMATAN TULANGAN',
            ),
            11 => 
            array (
                'id' => 12,
                'unit_name' => 'KECAMATAN KREMBUNG',
            ),
            12 => 
            array (
                'id' => 13,
                'unit_name' => 'KECAMATAN PRAMBON',
            ),
            13 => 
            array (
                'id' => 14,
                'unit_name' => 'KECAMATAN TARIK',
            ),
            14 => 
            array (
                'id' => 15,
                'unit_name' => 'KECAMATAN BALONGBENDO',
            ),
            15 => 
            array (
                'id' => 16,
                'unit_name' => 'KECAMATAN KRIAN',
            ),
            16 => 
            array (
                'id' => 17,
                'unit_name' => 'KECAMATAN WONOAYU',
            ),
            17 => 
            array (
                'id' => 18,
                'unit_name' => 'KECAMATAN SUKODONO',
            ),
            18 => 
            array (
                'id' => 19,
                'unit_name' => 'KECAMATAN WARU',
            ),
            19 => 
            array (
                'id' => 20,
                'unit_name' => 'KECAMATAN SEDATI',
            ),
            20 => 
            array (
                'id' => 21,
                'unit_name' => 'KECAMATAN BUDURAN',
            ),
            21 => 
            array (
                'id' => 22,
                'unit_name' => 'DINAS SOSIAL',
            ),
            22 => 
            array (
                'id' => 23,
                'unit_name' => 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
            ),
            23 => 
            array (
                'id' => 24,
                'unit_name' => 'DINAS LINGKUNGAN HIDUP DAN KEBERSIHAN',
            ),
            24 => 
            array (
                'id' => 25,
                'unit_name' => 'DINAS PENANAMAN MODAL DAN PTSP',
            ),
            25 => 
            array (
                'id' => 26,
                'unit_name' => 'SATUAN POLISI PAMONG PRAJA',
            ),
            26 => 
            array (
                'id' => 27,
                'unit_name' => 'BADAN KESATUAN BANGSA DAN POLITIK',
            ),
            27 => 
            array (
                'id' => 28,
                'unit_name' => 'DINAS PERINDUSTRIAN DAN PERDAGANGAN',
            ),
            28 => 
            array (
                'id' => 29,
                'unit_name' => 'BAGIAN PEMBANGUNAN, SEKRETARIAT DAERAH',
            ),
            29 => 
            array (
                'id' => 30,
                'unit_name' => 'DINAS KOMUNIKASI DAN INFORMATIKA',
            ),
            30 => 
            array (
                'id' => 31,
                'unit_name' => 'DINAS KESEHATAN',
            ),
            31 => 
            array (
                'id' => 32,
                'unit_name' => 'DINAS PENDIDIKAN DAN KEBUDAYAAN',
            ),
            32 => 
            array (
                'id' => 33,
                'unit_name' => 'DINAS PANGAN DAN PERTANIAN',
            ),
            33 => 
            array (
                'id' => 34,
                'unit_name' => 'BAGIAN PROTOKOL  DAN RUMAH TANGGA SEKRETARIAT DAERAH',
            ),
            34 => 
            array (
                'id' => 35,
                'unit_name' => 'BADAN PERENCANAAN PEMBANGUNAN DAERAH',
            ),
            35 => 
            array (
                'id' => 36,
                'unit_name' => 'BADAN PENANGGULANGAN BENCANA DAERAH',
            ),
            36 => 
            array (
                'id' => 37,
                'unit_name' => 'SEKRETARIAT DPRD',
            ),
            37 => 
            array (
                'id' => 38,
                'unit_name' => 'DINAS KEPEMUDAAN, OLAHRAGA DAN PARIWISATA',
            ),
            38 => 
            array (
                'id' => 39,
                'unit_name' => 'UPTD PUSKESMAS KRIAN',
            ),
            39 => 
            array (
                'id' => 40,
                'unit_name' => 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA',
            ),
            40 => 
            array (
                'id' => 41,
                'unit_name' => 'DINAS PPPA DAN KB',
            ),
            41 => 
            array (
                'id' => 42,
                'unit_name' => 'UPTD PUSKESMAS SEKARDANGAN
',
            ),
            42 => 
            array (
                'id' => 43,
                'unit_name' => 'UPTD PUSKESMAS URANG AGUNG
',
            ),
            43 => 
            array (
                'id' => 44,
                'unit_name' => 'BAGIAN PENGADAAN BARANG / JASA SEKRETARIAT DAERAH
',
            ),
            44 => 
            array (
                'id' => 45,
                'unit_name' => 'DINAS KOPERASI DAN USAHA MIKRO
',
            ),
            45 => 
            array (
                'id' => 46,
                'unit_name' => 'UPTD PUSKESMAS KEPADANGAN
',
            ),
            46 => 
            array (
                'id' => 47,
                'unit_name' => 'DINAS PEKERJAAN UMUM BINA MARGA DAN SUMBER DAYA AIR
',
            ),
            47 => 
            array (
                'id' => 48,
                'unit_name' => 'DINAS PERIKANAN
',
            ),
            48 => 
            array (
                'id' => 49,
                'unit_name' => 'UPTD PUSKESMAS KREMBUNG
',
            ),
            49 => 
            array (
                'id' => 50,
                'unit_name' => 'DINAS PERHUBUNGAN
',
            ),
        ));
        
        
    }
}