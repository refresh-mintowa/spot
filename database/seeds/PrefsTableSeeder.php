<?php

use Illuminate\Database\Seeder;

class PrefsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('prefs')->insert([
           'id' => 1,
           'area_id' => 1,
           'name'=>'北海道'
            ]);
            
         DB::table('prefs')->insert([
          'id' => 2,
          'area_id' => 1,
          'name'=>'青森'
            ]);
            
            DB::table('prefs')->insert([
             'id' => 3,
             'area_id' => 1,
             'name'=>'岩手県'
            ]);
             DB::table('prefs')->insert([
              'id' => 4,
              'area_id' => 1,
              'name'=>'宮城県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 5,
              'area_id' => 1,
              'name'=>'秋田県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 6,
              'area_id' => 1,
            'name'=>'山形県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 7,
              'area_id' => 1,
            'name'=>'福島県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 8,
              'area_id' => 2,
            'name'=>'茨城県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 9,
              'area_id' => 2,
            'name'=>'栃木県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 10,
              'area_id' => 2,
            'name'=>'群馬県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 11,
              'area_id' => 2,
            'name'=>'埼玉県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 12,
              'area_id' => 2,
            'name'=>'千葉県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 13,
              'area_id' => 2,
            'name'=>'東京都'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 14,
              'area_id' => 2,
            'name'=>'神奈川県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 15,
              'area_id' => 3,
            'name'=>'新潟県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 16,
              'area_id' => 3,
            'name'=>'富山県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 17,
              'area_id' => 3,
            'name'=>'石川県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 18,
              'area_id' => 3,
            'name'=>'福井県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 19,
              'area_id' => 3,
            'name'=>'山梨県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 20,
              'area_id' => 3,
            'name'=>'長野県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 21,
              'area_id' => 3,
            'name'=>'岐阜県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 22,
              'area_id' => 3,
            'name'=>'静岡県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 23,
              'area_id' => 3,
            'name'=>'愛知県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 24,
              'area_id' => 4,
            'name'=>'三重県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 25,
              'area_id' => 4,
            'name'=>'滋賀県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 26,
              'area_id' => 4,
            'name'=>'京都府'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 27,
              'area_id' => 4,
            'name'=>'大阪府'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 28,
              'area_id' => 4,
            'name'=>'兵庫県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 29,
              'area_id' => 4,
            'name'=>'奈良県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 30,
              'area_id' => 4,
            'name'=>'和歌山県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 31,
              'area_id' => 5,
            'name'=>'鳥取県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 32,
              'area_id' => 5,
            'name'=>'島根県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 33,
              'area_id' => 5,
            'name'=>'岡山県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 34,
              'area_id' => 5,
            'name'=>'広島県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 35,
              'area_id' => 5,
            'name'=>'山口県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 36,
              'area_id' => 5,
            'name'=>'徳島県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 37,
              'area_id' => 5,
            'name'=>'香川県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 38,
              'area_id' => 5,
            'name'=>'愛媛県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 39,
              'area_id' => 5,
            'name'=>'高知県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 40,
              'area_id' => 6,
            'name'=>'福岡県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 41,
              'area_id' => 6,
            'name'=>'佐賀県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 42,
              'area_id' => 6,
            'name'=>'長崎県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 43,
              'area_id' => 6,
            'name'=>'熊本県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 44,
              'area_id' => 6,
            'name'=>'大分県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 45,
              'area_id' => 6,
            'name'=>'宮崎県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 46,
              'area_id' => 6,
            'name'=>'鹿児島県'
            ]);
            
             DB::table('prefs')->insert([
              'id' => 47,
              'area_id' => 6,
            'name'=>'沖縄県'
            ]);
            
    }
}
