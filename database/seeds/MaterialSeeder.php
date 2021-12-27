<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $name = ["きゅうり","トマト","なす","まめ","キャベツ","ねぎ","はくさい","ほうれんそう","レタス","じゃがいも","だいこん","たまねぎ","にんじん","いちご","もも","すいか","ぶどう","なし","かき","みかん","りんご","バナナ","ぎゅうにく","とりにく","ぶたにく","ソーセージ","ハム","たまご","あじ","いわし","さば","さんま","さけ","まぐろ","たい","たら","えび","かに","いか","たこ"];
        for ($i=0; $i < count($name); $i++) { 
            DB::table('material')->insert([
                'material_name' => $name[$i],
                'material_price' => rand(10,100),
            ]);
        }
        
        
    }
}
