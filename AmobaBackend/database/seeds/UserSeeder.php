<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bool = DB::table('users')->select()->where('email','pruebas@amobasoftware.com')->get();
        if($bool->count() == 0){

            DB::table('users')->insertGetId([
                'name' => 'Amoba Software',
                'email' => 'pruebas@amobasoftware.com',
                'email_verified_at' => now(),
                'password' => bcrypt('134679'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
