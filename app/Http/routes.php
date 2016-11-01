<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//pusher
Route::get('/postEvent', function(){
	//begin hello world
	// use Vendor\Pusher\pusher\-php\-server\lib\Pusher;

	  $options = array(
	    'encrypted' => true
	  );
	  $pusher = new Pusher(
	    'd7a30c850a3fae6a16a5',
	    '2a71df68f5e2961ade37',
	    '265471',
	    $options
	  );

	  $data['message'] = 'Hello Lassen';
	  $pusher->trigger('postChannel', 'postEvent', $data);

	  //end hello world


	//getting the last post from database
	$post = DB::table('posts')->orderBy('created_at', 'desc')->first();
	//assigning values to the event
	event(new App\Events\postCreated(new App\Models\Post([
			// 'img_url' => $post->img_url,
			// 'content' => $post->content,
			// 'owner_id' => $post->owner_id,
			// 'group_id' => $post->group_id,
			// 'vote_score' => $post->vote_score,
			// 'likes' => $post->likes,
			// 'dislikes' => $post->dislikes
		])));

	return 'done';
});


//route for setting the votes for a post
Route::post('/api/setVotes', 'PostsController@setVotes');

//get up and downvotes
Route::get('api/getVotes/{id}', 'PostsController@getVotes');

//route to remove current user from knot
Route::get('/api/leaveKnot/{groupId}', 'UsersGroupController@leaveKnot');

//edit User
Route::post('/api/userUpdate', 'UsersController@update');
//delete User
Route::get('/api/deleteUser/{id}', 'UsersController@destroy');

//edit event
Route::post('/api/editEvent/{id}', 'EventsController@update');
//delete event
Route::get('/api/deleteEvent/{id}', 'EventsController@destroy');

//route to add the user to the knot
Route::post('/api/addKnot/', 'GroupsController@addUserToGroup');

Route::get('/api/posts', 'PostsController@index');
Route::post('/add/post','PostsController@store');
//replacing index to show only posts that are part of that group
Route::get('/api/posts/{id}', 'PostsController@show');


Route::get('/api/events', 'EventsController@index');
Route::post('/add/event','EventsController@store');
//getting events for the specific group by id
Route::get('/api/events/{id}', 'EventsController@show');


Route::get('/api/groups', 'GroupsController@index');
//calling to get the private groups specifically for the user logged in
Route::get('/api/private-groups', 'GroupsController@getPrivateGroups');

Route::get('/api/groups/{id}', 'GroupsController@show');
Route::post('/add/group', 'GroupsController@store');


Route::get('/', 'PostsController@home');
Route::get('/login', 'PostsController@welcome');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

