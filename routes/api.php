<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api route "jsonification" without controller mode 1(good for plain php too), customizable
// Route::get('posts', function(){
//     //response->json
//     $posts = Post::all();
//     return response()->json([

//         'response' => $posts
//     ]);
// });

//api route "jsonification" without controller method 2 (laravel shortcut, only works with laravel , not in plain php)

// Route::get('posts', function(){
//     //response->json
//     return Post::all();
// });

//api with relations and pagination
// Route::get('posts', function(){
//     //response->json
//     return Post::with(['category'])->paginate(5);
// });

Route::get('posts', 'API\PostController@index');
