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


Route::group(['prefix'=>'admin'],function(){
           
            Route::get('/', [
                'as'=> 'admin',
                'uses'=>'AdminController@getIndex'
            ])->middleware('isAdmin');

            // Route::get('categories','AdminController@getCategories');
            Route::get('categories', [
                'as'=> 'categories',
                'uses'=>'CategoriesController@getCategories'
            ])->middleware('isAdmin');
            // Route::get('categories','CategoriesController@getCategories]' );
            Route::get('addCategories', [
                'as'=> 'addCategories',
                'uses'=>'CategoriesController@addCategories'
            ])->middleware('isAdmin');

            Route::post('insertCategories', [
                'as'=> 'insertCategories',
                'uses'=>'CategoriesController@insertCategories'
            ])->middleware('isAdmin');

            Route::get('editCategories/{id}','CategoriesController@editCategory')->middleware('isAdmin');
            Route::put('updateCategories/{id}','CategoriesController@UpdateCategory')->middleware('isAdmin');

            Route::get('deleteCategories/{id}','CategoriesController@deleteCategory')->middleware('isAdmin');

            Route::get('products', [
                'as'=> 'products',
                'uses'=>'ProductsController@getProducts'
            ])->middleware('isAdmin');

            Route::get('addProducts', [
                'as'=> 'addProducts',
                'uses'=>'ProductsController@addProducts'
            ])->middleware('isAdmin');
            Route::get('pending', [
               'as'=> 'pending',
               'uses'=>'OrdersController@pendingRequest'
           ])->middleware('isAdmin');

            Route::get('updateProduct/{id}', [
                'as'=> 'updateProduct',
                'uses'=>'ProductsController@updateProduct'
            ])->middleware('isAdmin');
            Route::post('updateProduct', [
               'as'=> 'updateProduct',
               'uses'=>'ProductsController@postupdateProduct'
           ])->middleware('isAdmin');
           Route::post('updateuser', [
            'as'=> 'updateuser',
            'uses'=>'UserController@postupdateuser'
        ])->middleware('isAdmin');
            Route::post('insertProducts', [
               'as'=> 'insertProducts',
               'uses'=>'ProductsController@insertProducts'
           ])->middleware('isAdmin');
           

         
            Route::get('deleteProduct/{id}','ProductsController@deleteProduct')->middleware('isAdmin');
            Route::get('deleteuser/{id}','UserController@delete')->middleware('isAdmin');
            Route::get('deleteOrder/{id}','OrdersController@deleteOrder')->middleware('isAdmin');
           
            
            Route::get('order', [
               'as'=> 'order',
               'uses'=>'OrdersController@index'
           ])->middleware('isAdmin');
           Route::get('thanhvien', [
            'as'=> 'thanhvien',
            'uses'=>'AdminController@thanhvien'
        ])->middleware('isAdmin');
        Route::get('thongke', [
         'as'=> 'thongke',
         'uses'=>'AdminController@thongke'
     ])->middleware('isAdmin');
           Route::get('order/{id}', [
            'as'=> 'orderdetail',
            'uses'=>'OrdersController@detail'
        ])->middleware('isAdmin');
        Route::post('updatestatus',  
        ['as'=>'updatestatus',
        'uses'=>'OrdersController@updatestatus']
     )->middleware('isAdmin');

     Route::post('searchadmin',  
      ['as'=>'searchadmin',
   'uses'=>'ProductsController@search']
         );
            
});    

Route::get('/',  
   ['as'=>'/',
   'uses'=>'HomeController@index']
);
Route::get('shopping',  
   ['as'=>'shopping',
   'uses'=>'HomeController@shopping']
);
Route::get('khuyenmai',  
   ['as'=>'khuyenmai',
   'uses'=>'HomeController@khuyenmai']
);

Route::get('login',  
   ['as'=>'login',
   'uses'=>'UserController@getLogin']
);
Route::post('login',  
   ['as'=>'login',
   'uses'=>'UserController@postLogin']
);

Route::get('signup',  
   ['as'=>'signup',
   'uses'=>'UserController@getSignup']
);
Route::post('signup',  
   ['as'=>'signup',
   'uses'=>'UserController@postSignup']
);
Route::get('logout',  
   ['as'=>'logout',
   'uses'=>'UserController@logout']
);
Route::get('doipass',  
   ['as'=>'doipass',
   'uses'=>'UserController@doipass']
);
Route::get('laypass',  
   ['as'=>'laypass',
   'uses'=>'UserController@laypass']
);
//Route::resource('cart', 'CartController');
Route::get('cart',  
   ['as'=>'cart.index',
   'uses'=>'CartController@index']
);
Route::get('detail/{id}', [
   'as'=> 'detail',
   'uses'=>'ProductsController@detail'
]);
// Route::get('addcart/{id}',  
//    ['as'=>'addCart',
//    'uses'=>'CartController@addCart']
// );

Route::get('edituser/{id}', [
   'as'=> 'edituser',
   'uses'=>'UserController@edit'
]);
Route::post('addcart',  
   ['as'=>'addcart',
   'uses'=>'CartController@addCart']
);

Route::post('updatecart',  
   ['as'=>'updatecart',
   'uses'=>'CartController@updatecart']
);

Route::post('deleteitemcart',  
   ['as'=>'deleteitemcart',
   'uses'=>'CartController@deleteitemcart']
);

Route::post('checkout',  
   ['as'=>'checkout',
   'uses'=>'CartController@checkout']
);
Route::post('search',  
   ['as'=>'search',
   'uses'=>'HomeController@search']
);
Route::post('checkoutonline',  
   ['as'=>'checkoutonline',
   'uses'=>'CartController@create']
);
Route::get('return',  
   ['as'=>'return',
   'uses'=>'CartController@return']
);
Route::get('naruto',  
   ['as'=>'naruto',
   'uses'=>'HomeController@naruto']
);
Route::get('marvel',  
   ['as'=>'marvel',
   'uses'=>'HomeController@marvel']
);
Route::get('transformer',  
   ['as'=>'transformer',
   'uses'=>'HomeController@transformer']
);
Route::get('onepiece',  
   ['as'=>'onepiece',
   'uses'=>'HomeController@onepiece']
);
Route::get('dccomics',  
   ['as'=>'dccomics',
   'uses'=>'HomeController@dccomics']
);
Route::get('dragonball',  
   ['as'=>'dragonball',
   'uses'=>'HomeController@dragonball']
);





   