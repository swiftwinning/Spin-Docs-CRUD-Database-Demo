<?php

use Illuminate\Database\Seeder;

use App\Shop;
use App\Tag;

class ShopTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops =[
			'Armageddon Shop' => ['Used','CDs','Records','Tapes'],
			'Amoeba Music' => ['New','Used','CDs','Records'],
			'Jackpot Records' => ['Used','CDs','Records']
		];

		foreach($shops as $name => $tags) {

			$shop = Shop::where('name','like',$name)->first();

			foreach($tags as $tagName) {
				$tag = Tag::where('name','LIKE',$tagName)->first();
                $shop->tags()->save($tag);
			}
		}
    }
}