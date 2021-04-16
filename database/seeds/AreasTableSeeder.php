<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('areas')->insert(['id' => 1, 'name'=>'北海道・東北']);
        DB::table('areas')->insert(['id' => 2,'name'=>'関東']);
        DB::table('areas')->insert(['id' => 3,'name'=>'中部']);
        DB::table('areas')->insert(['id' => 4,'name'=>'近畿']);
        DB::table('areas')->insert(['id' => 5,'name'=>'中国・四国']);
        DB::table('areas')->insert(['id' => 6,'name'=>'九州']);
          DB::table('areas')->insert([
            'id' => 7,
            'name'=>'食事'
            ]);
    }
}
