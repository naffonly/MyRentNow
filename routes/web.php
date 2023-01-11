<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Auth::routes();
Route::get('/', 'MainController@index')->name('landing');

Route::group(['middleware' => ['auth','ceklogin:1']],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update'); 
    
    Route::get('/overview', 'UserController@index')->name('admin.overview');
    Route::get('/add-user', 'UserController@create')->name('user.create');
    Route::post('/store-user', 'UserController@store')->name('user.store');
    Route::get('/detail-user/{user}', 'UserController@show')->name('user.show');
    Route::post('/user-update', 'UserController@update')->name('user.update');
    Route::get('/user-del/{user}', 'UserController@softDelete')->name('user.softDelete');
    Route::get('/user-unBan/{user}', 'UserController@softDelete')->name('user.unBan');
    Route::get('/user-delete/{id}', 'UserController@destroy')->name('user.destroy');
    
    Route::get('/product-overview','ProductController@index')->name('product.overview');
    Route::get('/create-product','ProductController@create')->name('product.create');
    Route::post('/store-product','ProductController@store')->name('product.store');
    Route::get('/detail-product/{product}','ProductController@show')->name('product.show');
    Route::post('/update-product','ProductController@update')->name('product.update');
    Route::get('/delete-product/{product}','ProductController@softDelete')->name('product.softDelete');
    
    Route::get('/article-overview','ArticleController@index')->name('article.overview');
    Route::get('/create-article','ArticleController@create')->name('article.create');
    Route::post('/store-article','ArticleController@store')->name('article.store');
    Route::get('/detail-article/{article}','ArticleController@show')->name('article.show');
    Route::post('/update-article','ArticleController@update')->name('article.update');
    Route::get('/delete-article/{article}','ArticleController@softDelete')->name('article.softDelete');
    
    Route::get('/transaction-delete/{id}','TransactionController@destroy')->name('transaction.destroy');
    Route::get('/transaction-overview','TransactionController@index')->name('transaction.overview');
    Route::get('/transaction-overview-pending','TransactionController@indexPending')->name('transaction.overview.pending');
    Route::get('/transaction-overview-loaned','TransactionController@indexLoaned')->name('transaction.overview.loaned');
    Route::get('/transaction-overview-returned','TransactionController@indexReturned')->name('transaction.overview.returned');
    Route::get('/transaction-overview-lost','TransactionController@indexLost')->name('transaction.overview.lost');
    
    Route::get('/create-transaction','TransactionController@create')->name('transaction.create');
    Route::post('/store-transaction','TransactionController@store')->name('transaction.store');
    Route::get('/detail-transaction/{transaction}','TransactionController@show')->name('transaction.show');
    
    Route::post('/update-transaction','TransactionController@update')->name('transaction.update');
    Route::get('/delete-transaction/{transaction}','TransactionController@softDelete')->name('transaction.softDelete');
    Route::get('/loaned-transaction/{transaction}','TransactionController@loanedRent')->name('transaction.loaned');
    Route::get('/returned-transaction/{transaction}','TransactionController@returnedRent')->name('transaction.returned');
    Route::get('/lost-transaction/{transaction}','TransactionController@lostRent')->name('transaction.lost');
    Route::get('/returnedLostRent-transaction/{transaction}','TransactionController@returnedLostRent')->name('transaction.returnedLostRent');
    Route::get('/founded-transaction/{transaction}','TransactionController@foundRent')->name('transaction.found');
    Route::get('/show-transaction/{transaction}','TransactionController@getTransaction')->name('getTransaction');

    Route::get('/getAllProducts','ProductController@getAllProducts')->name('getAllProducts');
    Route::get('/getAllArcticles','ArticleController@getAllArcticles')->name('getAllArcticles');
    Route::get('/getAllTransactions','TransactionController@getAllTransactions')->name('getAllTransactions');
    Route::get('/getAllUsers','UserController@getAllUsers')->name('getAllUsers');
    Route::get('/getAllTransactionsPending','TransactionController@getAllTransactionsPending')->name('getAllTransactionsPending');
    Route::get('/getAllTransactionsLoaned','TransactionController@getAllTransactionsLoaned')->name('getAllTransactionsLoaned');
    Route::get('/getAllTransactionsReturned','TransactionController@getAllTransactionsReturned')->name('getAllTransactionsReturned');
    Route::get('/getAllTransactionsLost','TransactionController@getAllTransactionsLost')->name('getAllTransactionsLost');
});


Route::group(['middleware' => ['auth','ceklogin:2']],function(){
    Route::get('/costumer-profile', 'CustomerController@customerProfil')->name('costumer');
    Route::put('/costumer-profile', 'CustomerController@profilUpdate')->name('costumer.update');
    Route::get('/customer-transaction/{transaction}','CustomerController@getCosTransaction')->name('getCosTransaction');
    Route::get('/getCostomerTransaction','CustomerController@getCostomerTransaction')->name('getCostomerTransaction');
    Route::get('/dasboard', 'CustomerController@index')->name('dasboard');
    Route::post('/store-rent','TransactionController@rent')->name('transaction.rent');
});


Route::get('/katalog-barang','MainController@katalogIndex')->name('katalog');
Route::get('/tentang-kami','MainController@about')->name('about');
Route::get('/list-blog','MainController@listBlog')->name('listBlog');
Route::get('/faq','MainController@faq')->name('faq');
Route::get('/detail-blog/{article}','MainController@detailBlog')->name('detailBlog');



Route::get('/kamera-katalog','MainController@kameraKatalog')->name('kameraKatalog');
Route::get('/ht-katalog','MainController@htKatalog')->name('htKatalog');
Route::get('/laptop-katalog','MainController@laptopKatalog')->name('laptopKatalog');
Route::get('/ipad-katalog','MainController@ipadKatalog')->name('ipadKatalog');
Route::get('/proyektor-katalog','MainController@proyektorKatalog')->name('proyektorKatalog');
Route::get('/detail-katalog/{id}','MainController@detailKatalog')->name('detailKatalog');
Route::get('/detail-katalog','MainController@detailKatalog')->name('dKatalog')->middleware('auth');
