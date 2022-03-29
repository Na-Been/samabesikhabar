<?php

use Illuminate\Support\Facades\Route;

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

//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
Route::view('checkiframe', 'checkiframe');
Route::view('category/view', 'frontend.newsCategory');
Route::view('category/details', 'frontend.newsDetail');
Route::get('sub-category/{slug}', 'Frontend\NewsController@findSubCategory')->name('sub.category.details');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'backend'], function () {

    Route::get('/profile', 'Backend\ProfileController@profile')->name('profile');
    Route::put('/profile', 'Backend\ProfileController@profileUpdate')->name('profile.update');
    Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard');

    Route::get('advertisement/changeStatus/{id}', 'Backend\AdvertisementController@changeStatus');
    Route::resource('/advertisement', 'Backend\AdvertisementController');

    Route::get('photo/changeStatus/{id}', 'Backend\PhotoController@changeStatus');
    Route::resource('photo', 'Backend\PhotoController');
    Route::get('media', 'Backend\VideoController@media')->name('media.index');
    Route::get('/video/changeStatus/{id}', 'Backend\VideoController@changeStatus');
    Route::resource('/video', 'Backend\VideoController');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('lives/page', 'Backend\HomeController@showLivePage')->name('add.live.link');
    Route::get('lives/create', 'Backend\HomeController@showLiveCreatePage')->name('create.live.link');
    Route::post('lives/store', 'Backend\HomeController@storeLink')->name('store.live.link');
    Route::get('lives/show/edit/{id}', 'Backend\HomeController@showLiveUpdatePage')->name('edit.live.link');
    Route::put('lives/show/update/{id}', 'Backend\HomeController@updateLink')->name('update.live.link');
    Route::delete('lives/delete/{id}', 'Backend\HomeController@deleteLink')->name('delete.live.link');
    Route::get('live/changeStatus/{id}', 'Backend\HomeController@changeLiveStatus');
    Route::post('multiple/delete', 'Backend\NewsController@multipleDelete')->name('multiple.delete');
    Route::get('restore/delete/{id}', 'Backend\NewsController@restoreNews')->name('restore.delete');
    Route::delete('permanent/delete/{id}', 'Backend\NewsController@destroyNews')->name('permanent.delete');
});

require __DIR__ . '/auth.php';

Route::get('only/ads', 'Frontend\NewsController@getsAds');
Route::get('/', 'Frontend\HomeController@index')->name('home.index');
Route::get('/category/{slug}', 'Frontend\NewsController@findCat')->name('category-slug');
Route::get('/sub-category/{slug}', 'Frontend\NewsController@findSubCat')->name('sub.category-slug');
Route::post('/search/news', 'Frontend\NewsController@searchNews')->name('news.search');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('all/videos', 'Frontend\NewsController@displayAllVideos')->name('display.all.videos');
Route::get('ads/views/add/{id}', 'Frontend\HomeController@addAdsViews')->name('ads.counts');

Route::view('file', 'file-manager');
Route::get('news/{slug1}/{slug2}/{slug3}/{slug4}', 'Frontend\NewsController@newsDetail')->name('news-detail');


