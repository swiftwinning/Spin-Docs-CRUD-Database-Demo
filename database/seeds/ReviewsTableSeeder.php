<?php

use Illuminate\Database\Seeder;

use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = json_decode(file_get_contents(database_path().'/reviews.json'), True);
        
        foreach($reviews as $review) {
            Review::insert([
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                'shop_id' => $review[0],
                'stars' => $review[1],
                'text' => $review[2],
            ]);
        
        }
    }
}
