<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            'title'=> 'タイトルが入ります。',
            'body'=> 'テキストテキスとテキスト',
            'category_id'=>1,
            'pref_id'=>2,
            'user_id'=>1
            ]);
            
         DB::table('posts')->insert([
            'title'=> 'タイトルが入ります2。',
            'body'=> 'テキストテキスとテキスト2',
            'category_id'=>2,
            'pref_id'=>5,
            'user_id'=>1
            ]);
    }
}
