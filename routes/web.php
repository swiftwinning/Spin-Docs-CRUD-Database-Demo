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
Route::get('/shops/new', 'RecordShopController@createNewProfile');

# Get route to show a record shop profile
Route::get('/shops/{id?}', 'RecordShopController@profile');

# Get route to show a form to edit an existing record shop profile
    Route::get('/shops/edit/{id}', 'RecordShopController@editProfile');









if(App::environment('local')) {
    Route::get('/drop', function() {
        $db = 'spindocs';
        DB::statement('DROP database '.$db);
        DB::statement('CREATE database '.$db);
        return 'Dropped '.$db.'; created '.$db.'.';
    });
};





Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
    	echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;
    	/*
	The following commented out line will print your MySQL credentials.
	Uncomment this line only if you're facing difficulties connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
	//print_r(config('database.connections.mysql'));

	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	}
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});


Route::get('/debugbar', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';

});

Route::get('/jsontest', function() {

    
    $contents = file_get_contents(database_path().'/shops.json');
    $shops = json_decode($contents, true);
    
    var_dump($contents);
    var_dump($shops);

});



$shops = json_decode(file_get_contents(database_path().'/shops.json'), True);