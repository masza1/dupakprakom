<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            // 0 => 
            // array (
            //     'id' => 1,
            //     'username' => 'dupakprakom',
            //     'email' => 'dupakprakom@gmail.com',
            //     'email_verified_at' => '2022-06-23 04:34:57',
            //     'password' => '$2y$10$39wlD7SRwudTJCFUGYptFOGERUp/zZ9ZPOpMJSfzc.1wzS/Sr0NO.',
            //     'level' => 'admin',
            //     'remember_token' => NULL,
            //     'created_at' => '2022-06-22 21:33:43',
            //     'updated_at' => '2022-06-22 21:33:43',
            // ),
            1 => 
            array (
                'id' => 1,
                'username' => 'sekretariat',
                'email' => 'sekretariat@gmail.com',
                'email_verified_at' => '2022-06-23 21:40:48',
                'password' => '$2y$10$39wlD7SRwudTJCFUGYptFOGERUp/zZ9ZPOpMJSfzc.1wzS/Sr0NO.',
                'level' => 'sekretariat',
                'remember_token' => NULL,
                'created_at' => '2022-06-23 21:42:12',
                'updated_at' => '2022-06-23 21:42:16',
            )/* ,
            2 => 
            array (
                'id' => 9,
                'username' => 'penilai1',
                'email' => 'penilai1@gmail.com',
                'email_verified_at' => '2022-06-26 07:17:20',
                'password' => '$2y$10$39wlD7SRwudTJCFUGYptFOGERUp/zZ9ZPOpMJSfzc.1wzS/Sr0NO.',
                'level' => 'penilai',
                'remember_token' => NULL,
                'created_at' => '2022-06-26 07:17:34',
                'updated_at' => '2022-06-26 07:17:37',
            ),
            3 => 
            array (
                'id' => 14,
                'username' => NULL,
                'email' => 'pamo@mailinator.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$e0Ut2kgICykfD1URMU8Gcuney/ap9ZGY4vWmMdH1vpQ50gQp5r856',
                'level' => 'penilai',
                'remember_token' => NULL,
                'created_at' => '2022-06-26 04:18:52',
                'updated_at' => '2022-06-26 04:18:52',
            ),
            4 => 
            array (
                'id' => 15,
                'username' => 'prakom1',
                'email' => 'prakom1@mailinator.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$aV7/vh6DBhcxYV4Tx0f34uTO8PaHDLBzb2t220rg8MPeykRueTJXe',
                'level' => 'prakom',
                'remember_token' => NULL,
                'created_at' => '2022-06-26 04:29:35',
                'updated_at' => '2022-06-26 04:29:35',
            ), */
        ));
        
        
    }
}