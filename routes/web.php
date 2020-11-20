<?php

use Illuminate\Support\Facades\Route;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\Auth;
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







/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@redirectToDashboard')->name('dashboard');

Route::group([ 'prefix' => '/admin' ], function(){
	
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	//manage categories routes start
	Route::group([ 'prefix' => '/categories' ], function(){
		//create category start
		Route::get('/manage', 'Backend\CategoryController@index')->name('manageCategory');

		//add category start
		Route::get('/create', 'Backend\CategoryController@create')->name('createCategory');
		Route::post('/create', 'Backend\CategoryController@store')->name('storeCategory');

		//edit category route
		Route::get('/edit/{id}','Backend\CategoryController@edit')->name('editCategory');
		Route::post('/edit/{id}','Backend\CategoryController@update')->name('updateCategory');

		//delete category route
		Route::post('/delete/{id}','Backend\CategoryController@destroy')->name('deleteCategory');
	});
	//manage categories routes end

	// manage brand route start
	Route::group(['prefix'=>'/Brand'],function(){

		//get brand route start
		Route::get('/manage','Backend\BrandController@index')->name('manageBrand');

		//create brand route start
		Route::get('/create','Backend\BrandController@create')->name('createBrand');
		Route::post('/create','Backend\BrandController@store')->name('storeBrand');

		//edit brand route start
		Route::get('/edit/{id}','Backend\BrandController@edit')->name('editBrand');
		Route::post('/edit/{id}','Backend\BrandController@update')->name('updateBrand');

		//delete route start
		Route::post('/delete/{id}','Backend\BrandController@destroy')->name('deleteBrand');
	});
	// manage brand route end

	// products route start
	Route::group(['prefix'=>'/Product'],function(){

		//get product route start
		Route::get('/manage','Backend\ProductController@index')->name('manageProduct');

		//create product route start
		Route::get('/create','Backend\ProductController@create')->name('createProduct');
		Route::post('/create','Backend\ProductController@store')->name('storeProduct');

		//edit product route start
		Route::get('/edit/{product:slug}','Backend\ProductController@edit')->name('editProduct');
		Route::post('/edit/{product:slug}','Backend\ProductController@update')->name('updateProduct');

		//delete product route start
		Route::post('/delete/{product:slug}','Backend\ProductController@destroy')->name('deleteProduct');
	});
	// products route end

	// Division route start
	Route::group(['prefix'=>'/Division'],function(){

		//get product route start
		Route::get('/manage','Backend\DivisionController@index')->name('manageDivision');

		//create product route start
		Route::get('/create','Backend\DivisionController@create')->name('createDivision');
		Route::post('/create','Backend\DivisionController@store')->name('storeDivision');

		//edit product route start
		Route::get('/edit/{id}','Backend\DivisionController@edit')->name('editDivision');
		Route::post('/edit/{id}','Backend\DivisionController@update')->name('updateDivision');

		//delete product route start
		Route::post('/delete/{id}','Backend\DivisionController@destroy')->name('deleteDivision');
	});
	// Division route end

	// District route start
	Route::group(['prefix'=>'/District'],function(){

		//get product route start
		Route::get('/manage','Backend\DistrictController@index')->name('manageDistrict');

		//create product route start
		Route::get('/create','Backend\DistrictController@create')->name('createDistrict');
		Route::post('/create','Backend\DistrictController@store')->name('storeDistrict');

		//edit product route start
		Route::get('/edit/{id}','Backend\DistrictController@edit')->name('editDistrict');
		Route::post('/edit/{id}','Backend\DistrictController@update')->name('updateDistrict');

		//delete product route start
		Route::post('/delete/{id}','Backend\DistrictController@destroy')->name('deleteDistrict');
	});
	// District route end

	// banner route start
	Route::group(['prefix'=>'/Banner'],function(){

		//get product route start
		Route::get('/manage','Backend\BannerController@index')->name('manageBanner');

		//create product route start
		Route::get('/create','Backend\BannerController@create')->name('createBanner');
		Route::post('/create','Backend\BannerController@store')->name('storeBanner');

		//edit product route start
		Route::get('/edit/{banner:slug}','Backend\BannerController@edit')->name('editBanner');
		Route::post('/edit/{banner:slug}','Backend\BannerController@update')->name('updateBanner');

		//delete product route start
		Route::post('/delete/{banner:slug}','Backend\BannerController@destroy')->name('deleteBanner');
	});
	// banner route end

	// ad route start
	Route::group(['prefix'=>'/advertisement'],function(){

		//get ad route start
		Route::get('/manage','Backend\AdController@index')->name('manageAd');

		//create ad route start
		Route::post('/create','Backend\AdController@store')->name('storeAd');

		//edit ad route start
		Route::get('/edit/{id}','Backend\AdController@edit')->name('editAd');
		Route::post('/edit/{id}','Backend\AdController@update')->name('updateAd');

		//delete ad route start
		Route::post('/delete/{id}','Backend\AdController@destroy')->name('deleteAd');
	});
	// ad route end


	//ajax crud
	Route::group(['prefix'=>'/ajax-crud'], function(){
		Route::get('/manage','Backend\AjaxController@index')->name('ajax.crud.all');
		Route::get('/data','Backend\AjaxController@all_data')->name('ajax.data');
		Route::post('/add','Backend\AjaxController@store')->name('ajax.crud.add');
		Route::get('/edit/{id}','Backend\AjaxController@edit')->name('ajax.crud.edit');
		Route::post('/update/{id}','Backend\AjaxController@update')->name('ajax.crud.update');
		Route::get('/delete/modal/{id}','Backend\AjaxController@delete_modal')->name('ajax.crud.delete_modal');
		Route::post('/delete/{id}','Backend\AjaxController@delete')->name('ajax.crud.delete');
	});
	//ajax crud end

});


/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/










/*
|--------------------------------------------------------------------------
| Login and register Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin login
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('adminLogin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('createAdmin');

//////////// Visitor LOGIN ROUTE START
//user login
Route::get('/login/visitor', 'Auth\LoginController@showVisitorLoginForm')->name('showVisitorLoginForm');
Route::post('/login/visitor', 'Auth\LoginController@visitorLogin')->name('visitorLogin');

//show  visitor register form
Route::get('/register/visitor', 'Auth\RegisterController@showVisitorRegisterForm')->name('showVisitorRegisterForm');
//create visitor
Route::post('/register/visitor', 'Auth\RegisterController@createVisitor')->name('createVisitor');

//////////// Visitor LOGIN ROUTE END
Route::view('/admin', 'admin');
Route::view('/visitor', 'visitor');

/*
|--------------------------------------------------------------------------
| Login and register Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

















/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\FrontendController@home')->name('index');

Route::get('/about', 'Frontend\FrontendController@about')->name('about');

Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');

Route::get('/blog', 'Frontend\FrontendController@blog')->name('blog');

Route::get('/account', 'Frontend\FrontendController@account')->name('account');
Route::get("/editVisitor/{visitor:id}", 'Frontend\VisitorProfileController@edit')->name('editVisitor');
Route::post("/updateVisitor/{visitor:id}", 'Frontend\VisitorProfileController@update')->name('updateVisitor');

Route::get('/editaccount', 'Frontend\FrontendController@editaccount')->name('editaccount');

Route::get('/checkout', 'Frontend\FrontendController@checkout')->name('checkout');

Route::get('/compare', 'Frontend\FrontendController@compare')->name('compare');

Route::get('/component', 'Frontend\FrontendController@component')->name('component');

Route::get('/faq', 'Frontend\FrontendController@faq')->name('faq');

Route::get('/post', 'Frontend\FrontendController@post')->name('post');

Route::get('/product', 'Frontend\FrontendController@product')->name('product');

Route::group(['prefix'=>'/ProductDetail'], function(){
	//products pages route
	Route::get('/{slug}', 'Frontend\ProductController@show')->name('productDetails');
});

//products pages route
Route::get('/category/{category:slug}', 'Frontend\CategoryController@show')->name('shopPage');


//cart route
Route::post('/cart','Frontend\CartsController@cartStore')->name('cartStore');
Route::get('/get_cart','Frontend\CartsController@get_cart')->name('get_cart');
Route::delete('/delete_cart/{id}','Frontend\CartsController@delete_cart')->name('delete_cart');




Route::get('/termsandcondition', 'Frontend\FrontendController@termsandcondition')->name('termsandcondition');

Route::get('/trackorder', 'Frontend\FrontendController@trackorder')->name('trackorder');

Route::get('/typography', 'Frontend\FrontendController@typography')->name('typography');

Route::get('/wishlist', 'Frontend\FrontendController@wishlist')->name('wishlist');

Route::get('/visitorLogin', 'Frontend\FrontendController@visitorLogin')->name('visitorLogin');

Route::get('/visitorRegister', 'Frontend\FrontendController@visitorRegister')->name('visitorRegister');

Route::get('/404', 'Frontend\FrontendController@error')->name('error');

Route::get('/search', 'Frontend\FrontendController@search')->name('search');



/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/