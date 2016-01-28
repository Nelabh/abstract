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
//Authentication Route

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::get('/',function(){
//    return view('search.search');
//});

Route::get('downloadexcel',function(){
   $file=public_path()."/Supplier_AddProduct.xlsm";
        return Response::download($file);
});
Route::post('importproduct', [
    'as' => 'products.import', 'uses' => 'ProductController@import'
]);
Route::get('getcategorylist','SearchProductController@getSuggestedProducts');

Route::post('delete-registered-images', 'RegistrationController@deleteimages');

//user profile routes with auth middleware
//user profile routes with auth middleware
Route::resource('general','GeneralController');
Route::resource('contact','ContactController');
Route::resource('business','BusinessController');
Route::resource('products','ProductController');
Route::resource('registration','RegistrationController');
Route::resource('management','ManagementController');
Route::resource('financial','FinancialController');
Route::resource('certification','CertificateController');
Route::resource('initiatives','InitiativeController');
//Route::resource('authController','AuthController');

//General Routes

//Home routes
Route::get('/', 'HomeController@index');
Route::get('profile/{username}','HomeController@profile');
Route::get('user/products/{username}','HomeController@user_products');
//Route::get('profile/get-products/{username}','HomeController@getUserProducts');
Route::get('verify/{email}/{code}','HomeController@verify');
Route::get('/terms','HomeController@terms');
Route::get('/blog','HomeController@blog');
Route::get('/resend','HomeController@resend');
Route::post('/resend','HomeController@mail_vc');
//Route::get('/home','UserController@index');
Route::get('/buy-request','HomeController@buy_request');
Route::post('/buy-request','HomeController@store_request');
Route::post('/ajaxGetSubUnits','HomeController@subunits');
Route::post('/subscribe','HomeController@subscribe');

Route::get( '/changePassword' , ['middleware' => 'auth', function(){
    $user = Auth::user();
    return view('auth.change-password',compact('user'));
}]);
Route::post( '/changePassword' , 'UserController@changePassword' );
//Search routes
    //from home
Route::get('search','SearchProductController@searchProduct');
//Route::get('newsearch','SearchProductController@searchProduct');
    //from search page
//Route::get('search/reset','SearchProductController@index');
Route::get('category/{slug}','SearchProductController@category');
Route::get('sub-category/{slug}','SearchProductController@sub_category');
Route::get('child-category/{slug}','SearchProductController@child_category');

Route::post('/filter','SearchProductController@filterProducts');

//Route::get('nature/{slug}','SearchProductController@nature');
//Route::get('year/{min}/{max}','SearchProductController@year');
//Route::get('credit/{slug}','SearchProductController@credit');
//Route::get('area/{slug}','SearchProductController@area');
    //from vendor
Route::get('vendor/','VendorSearchController@searchVendor');
//Route::get('vendor/nature/{slug}','VendorSearchController@nature');
//Route::get('vendor/credit/{slug}','VendorSearchController@credit');
//Route::get('vendor/area/{slug}','VendorSearchController@area');
//Route::get('vendor/year/{min}/{max}','VendorSearchController@year');
    //compare page
Route::get('compare/add/{product_id}','CompareProductsController@addToCompare');
Route::get('compare/compare','CompareProductsController@compare');
Route::get('compare/remove/{product_id}','CompareProductsController@remove');
Route::get('compare/destroy','CompareProductsController@destroy');
    //Ajax Routes
Route::post('/getSubCategories','ProductController@getSubCategories');
Route::post('/getSubSubCategories','ProductController@getSubSubCategories');
Route::post('/getAttributesHtml','ProductController@getAttributesHtml');

Route::get('/product',function(){
   return view('search');
});
Route::get('/productdetails',function(){
   return view('productdetails');
});
Route::get('laravel-version', function()
{
$laravel = app();
return "Your Laravel version is ".$laravel::VERSION;
});


//Testing Routes
Route::get('detail/add_to_cart',array('before'=>'csrf','uses'=>'AjaxController@add_to_cart'));
Route::get('detail/request_sample',array('before'=>'csrf','uses'=>'AjaxController@request_sample'));

Route::get('cart',array( 'as'=>'cart','uses'=>'CartController@viewcart'));

Route::get('buyer',array( 'as'=>'bdc','uses'=>'testing\BDController@home'));
Route::post('request',array( 'before'=>'csrf','uses'=>'testing\BDController@request'));
Route::get('detail/{id}',array( 'as'=>'pro_detail','uses'=>'ProductDetailController@index'));
Route::get('insert_meta',array( 'as'=>'insert','uses'=>'testing\BDController@insert_meta'));
Route::post('post_info',array( 'before'=>'csrf','uses'=>'testing\BDController@post_info'));
Route::get('home',array( 'as'=>'info','uses'=>'testing\BDController@info'));
Route::get('wait',array( 'as'=>'wait','uses'=>'testing\BDController@wait'));
Route::get('wait2',array( 'as'=>'wait2','uses'=>'testing\BDController@wait2'));
Route::post('place_order',array( 'as'=>'place_order','uses'=>'ProductDetailController@place_order'));
Route::get('req_sample',array( 'as'=>'req_sample','uses'=>'ProductDetailController@req_sample'));
Route::get('wait_order',array( 'as'=>'wait_order','uses'=>'ProductDetailController@wait_order'));
Route::get('wait_req',array( 'as'=>'wait_req','uses'=>'ProductDetailController@wait_req'));
Route::get('/feedback','ProductController@submitFeedback');

