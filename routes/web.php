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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/termsConditions', 'IndexController@termsConditions')->name('termsConditions');
Route::get('/postTerms&Conditions', 'IndexController@postTC')->name('postTC');
Route::get('/aboutUs', 'IndexController@aboutUs')->name('aboutUs');

Route::get('/contactUs', 'IndexController@contactUs')->name('contactUs');
Route::post('/sendMessage', 'IndexController@sendMessage')->name('sendMessage');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('editMyAd/{adID}/removeImg/{imgName}', 'User\MyadsController@removeImg')->name('removeImg');


Route::get('/', 'IndexController@index');

Route::get('/listing/{id}', 'IndexController@listing')->name('listing');
Route::get('/sublisting/{catID}/{subCatID}', 'IndexController@sublisting')->name('sublisting');
Route::post('/listing/{id}/message', 'IndexController@message');
Route::post('/listing/{id}/report', 'IndexController@report');
Route::get('/listing/{id}/{slug}', 'IndexController@listingSinglePage')->name('listingSinglePage');
//Route::get('/listing/{id}/singlePage/{listingId}', 'IndexController@listingSinglePage')->name('listingSinglePage');

//Auth::routes();

Route::get('/home', 'HomeController@index');



Route::get('/admin/waitingPosts', 'Admin\PostsReviewController@waitingPosts')->name('waitingPosts');
Route::get('/admin/singleAdToApprove/{id}', 'Admin\PostsReviewController@singleAdToApprove')->name('singleAdToApprove');
Route::get('/admin/approvePost/{adID}/{adminID}', 'Admin\PostsReviewController@approvePost')->name('approvePost');

Route::get('/admin/waitingMessage', 'Admin\ContactController@waitingMessage')->name('waitingMessage');
Route::get('/admin/complaint', 'Admin\ContactController@complaint')->name('complaint');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});





Route::prefix('superAdmin')->group(function() {
  Route::get('/login', 'Auth\SuperAdminLoginController@showLoginForm')->name('superAdmin.login');
  Route::post('/login', 'Auth\SuperAdminLoginController@login')->name('superAdmin.login.submit');
  Route::get('/', 'SuperAdminController@index')->name('superAdmin.dashboard');
});

Route::resource('superAdmin/categories', 'CategoriesController', ['names'=>[
'index'=>'categories.index',
'create'=>'categories.create',
'store'=>'categories.store',
'edit'=>'categories.edit',
]]);


Route::resource('superAdmin/subCategory', 'superAdmin\subCatController', ['names'=>[
'index'=>'subCategory.index',
'create'=>'subCategory.create',
'store'=>'subCategory.store',
'edit'=>'subCategory.edit',
]]);



Route::resource('user/info', 'User\InfoController', ['names'=>[
	'update'=>'userInfo.update',
]]);

Route::get('myAdSinglePage/{id}/{slug}', 'User\MyadsController@myAdSinglePage')->name('myAdSinglePage');
//Route::get('/listing/{adId}/message', 'User\MyadsController@message');
Route::get('myMessage', 'User\MyadsController@myMessage')->name('myMessage');
Route::post('messageReply', 'User\MyadsController@messageReply')->name('messageReply');
Route::get('deleteMessage/{id}', 'User\MyadsController@deleteMessage')->name('deleteMessage');
Route::get('deleteMessageReply/{id}', 'User\MyadsController@deleteMessageReply')->name('deleteMessageReply');

Route::get('removedAds/{userID}', 'User\MyadsController@removedAds')->name('removedAds');
Route::get('deleteForever/{adID}/{userID}','User\MyadsController@deleteForever')->name('deleteForever');
Route::get('restore/{adID}/{userID}', 'User\MyadsController@restore')->name('restore');

Route::resource('myAds', 'User\MyadsController', ['names'=>[
'index'=>'myAds',
'create'=>'myAds.createt',
'store'=>'myAds.store',
'edit'=>'myAds.edit',
'update'=>'myAds.update',
'destroy'=>'myAds.delete',
]]);

Route::get('editMyAd/{adID}/{userID}', 'User\AdController@editMyAd')->name('editMyAd');


Route::get('editMyAd/{adID}/editMyAd/{id}', 'User\AdController@getSubCatEdit');


Route::post('updateMyAd/{adID}/{userID}', 'User\AdController@updateMyAd')->name('updateMyAd');



Route::group(['middleware' => 'web'], function() {
	Route::get('user/post/getSubCat/{id}', 'User\AdController@getSubCat');

	Route::resource('user/post', 'User\AdController', ['names'=>[
		'index'=>'user.post.index',
		'create'=>'user.post.create',
		'store'=>'user.post.store',
		'edit'=>'user.post.edit',
		'show'=>'user.post.show'
	]]);
});


Auth::routes();

Route::get('/home', 'HomeController@index');
