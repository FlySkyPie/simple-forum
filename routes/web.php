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

Route::get('/test', function () {
    //$Data = App\CraftBillForum\Forum::searchPost( "3D列印" );
    //return (array)$Data;
});

/* 
 * 身份驗證路由， Laravel提供的整套身份驗證功能，ex:註冊、登入、重設密碼....
 */
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//首頁 homepage
Route::get('/', 'HomepageController@show')->name('homepage');
//搜尋頁
Route::get('/search', 'SearchController@start')->name('search');      //搜尋重新定向用頁面
Route::get('/search/{tag}', 'SearchController@show')->name('search.result');

//發表文章頁面
Route::get('posts/create','PostController@create')
        ->name('post.create')
        ->middleware('auth');

//顯示文章
Route::get('posts/{id}','PostController@show')
        ->name('post.show')
        ->middleware('post.exist');

//發表文章 POST處理頁面
Route::post('posts/','PostController@store')
        ->name('post.store')
        ->middleware('auth')
        ->middleware('post.title')
        ->middleware('post.message');

//編輯文章頁面
Route::get('posts/{id}/edit','PostController@edit')
        ->name('post.edit')
        ->middleware('post.exist')
        ->middleware('auth');

//發表回覆
Route::post('posts/{id}','PostController@storeReply')
        ->name('reply.store')
        ->middleware('auth')
        ->middleware('post.exist')
        ->middleware('post.message');


//編輯文章 PUT處理頁面
Route::put('posts/{id}','PostController@update')
        ->name('post.update')
        ->middleware('auth')
        ->middleware('post.exist')
        ->middleware('topic.title')
        ->middleware('post.message')
        ->middleware('post.owner');

//刪除文章 DELETE處理頁面
Route::delete('posts/{id}','PostController@destroy')
        ->name('post.destroy')
        ->middleware('auth')
        ->middleware('post.exist')
        ->middleware('post.content')
        ->middleware('post.owner');

//發表回覆文章頁面
Route::get('posts/{id}/create','PostController@createreply')
        ->name('post.createreply')
        ->middleware('post.exist')
        ->middleware('auth');

//發表留言 POST處理頁面
Route::post('posts/{id}/comment','CommentController@store')
        ->name('comment.store')
        ->middleware('post.exist')
        ->middleware('auth')
        ->middleware('comment.content');

//刪除留言 DELETE處理頁面
Route::delete('comments/{id}','CommentController@destroy')
        ->name('comment.destroy')
        ->middleware('auth')
        ->middleware('comment.exist')
        ->middleware('comment.owner');

//no way
Route::get('posts/','HomepageController@showError');
Route::get('posts/{id}/comment','HomepageController@showError');
