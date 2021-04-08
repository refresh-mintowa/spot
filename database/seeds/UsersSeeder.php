<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'id'=>1,
            'name'=> 'towa',
            'email'=> 'towagarrix@gmail.com',
            'password'=>'ltcl@towa',
            
            ]);
            
         DB::table('users')->insert([
            'id'=>2,
            'name'=> '高橋',
            'email'=> 'towagarrix@yahoo.co.jp',
            'password'=>'ltcl@towa2',
            
            ]);
    }
}
