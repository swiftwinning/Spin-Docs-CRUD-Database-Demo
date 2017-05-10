<?php

use Illuminate\Database\Seeder;

use App\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               
        $shops = json_decode(file_get_contents(database_path().'/shops.json'), True);
        
        foreach($shops as $name => $shop) {
            Shop::insert([
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'name' => $shop['name'],
                'address' => $shop['address'],
                'city' => $shop['city'],
                'state' => $shop['state'],
                'zip' => $shop['zip'],
                'phone' => $shop['phone'],
                'web_link' => $shop['web_link'],
            ]);
        
        }
    }
}