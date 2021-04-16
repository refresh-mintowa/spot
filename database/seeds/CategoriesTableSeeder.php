<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'id' => 1,
            'category'=>'食事'
            ]);
            
         DB::table('categories')->insert([
             'id' => 2,
            'category'=>'宿泊'
            ]);
            
         DB::table('categories')->insert([
             'id' => 3,
            'category'=>'観光'
            ]);
    }
}
