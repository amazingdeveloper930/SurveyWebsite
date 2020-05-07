<?php

use Illuminate\Http\Request;
use App\Blog;
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

Route::get('/blogs/{take?}', function ($take=0,Request $request) {
	
if($take>0){
return Blog::orderBy('id','desc')->take($take)->get();
}else{
return Blog::orderBy('id','desc')->get();
}
  
});

Route::get('/blog/{slug}', function ($slug,Request $request) {
    return Blog::where('slug',$slug)->first();
});

Route::group(['prefix' => 'v1'], function() {
   
    Route::post('payment_list', 
        ['uses' => 'ApiController@payment_list']);
});