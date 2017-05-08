<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Get route to show the main page
Route::get('/', 'RecordShopController@main');

# Get route to show all record shops
Route::get('/shops/', 'RecordShopController@allShops');

# Get route to show a record shop profile
Route::get('/shops/{id?}', 'RecordShopController@profile');







if(App::environment('local')) {
    Route::get('/drop', function() {
        $db = 'foobooks';
        DB::statement('DROP database '.$db);
        DB::statement('CREATE database '.$db);
        return 'Dropped '.$db.'; created '.$db.'.';
    });
};
