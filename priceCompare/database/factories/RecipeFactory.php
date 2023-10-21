<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'name' =>fake()->randomElement(['赤かぶサラダ', 'アクアパッツァ', '揚げごぼうのサラダ', '揚げ大豆サラダ', 'アスパラサラダ', 'アセロラゼリー', '厚揚げのサラダ', '厚揚げのスープ', '厚揚げの肉みそがけ', 'アップルケーキ', '油揚げの肉詰め焼き', '天の川スープ', 'あやみどり米粉揚げパン', 'あやみどりサラダ', '淡雪ライス', 'あんかけ焼きそば', 'あんバタサンド', 'いかくんサラダ', 'イカのチリソース', 'イカの煮つけ', '炒めビーフン', 'いちごのフルーツパフェ', '糸寒天サラダ', '芋栗ごはん', '芋栗ごはん', 'いももち', 'いわしの梅干し煮', 'いわしの塩麴焼き', 'うとうくん蒸しパン', '梅風味つくね蒸し', 'ＡＢＣスープ', '枝豆サラダ', 'えのきとトマトの和風サラダ', 'えびチャーハン', 'エビとイカのチリソース', 'えんぴつ揚げ', 'オーロラ鯨', 'オーロラチキン', 'お菓子な目玉焼き', 'おからグラタン', 'おからケーキ', 'おからのキッシュ', 'おからハンバーグ', '小倉蒸しパン', 'お好み焼き', 'おさかなコロッケ', 'お茶漬け', 'おでん', 'おまめのスープ', 'オレンジカップケーキ', 'おろし和え', '鶏肉のから揚げレモンソースかけ', '鶏肉のごま味噌焼き', '鶏肉のつくね', '鶏肉のマーマレード焼き', '鶏肉のマヨカレー焼き', '鶏の梅しそチーズ焼き', 'わかめスパゲッティ', '和風梅チキン', 'ワンタンスープ', 'ラタトゥイユ', 'りんごサラダ', 'りんごのクラフティ', 'レーズンクッキー', 'レタススープ', 'レタスチャーハン', 'レタス春巻き', 'レタス蒸し', 'レバーのかりんとう揚げ', 'れんこんサラダ']),
            'description' => fake()->realText($maxNbChars = 700, $indexSize = 5)
        ];
    }
}
