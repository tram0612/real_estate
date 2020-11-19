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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::pattern('id','([0-9]+)');
Route::pattern('slug','(.*)');
Route::pattern('page','([0-9]+)');
Route::pattern('author','(.*)');
Route::get('/pass',function(){
	return bcrypt('1234');
});

Route::namespace('Auth')->group(function () {
   	


	Route::prefix('admin')->group(function(){

			Route::get('/login',[
			'uses'=>'AuthController@getLogin',
			'as'=>'auth.login',
		]);
		Route::post('/login',[
			'uses'=>'AuthController@postLogin',
			'as'=>'auth.login',
		]);
		Route::get('/logout',[
			'uses'=>'AuthController@logout',
			'as'=>'auth.logout',
		]);
	});

});
Route::namespace('Admin')->middleware('auth')->group(function () {

   	Route::prefix('admin')->group(function(){
   		Route::get('/',[
				'uses'=>'AdminNewsController@index',
				'as'=>'admin.news.index',
			])->middleware('clandauth:admin|supermod|mod');

   		Route::prefix('users')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminUsersController@index',
				'as'=>'admin.users.index',
				])->middleware('clandauth:admin|supermod|mod');

				Route::get('/edit/{page}/{id}',[
					'uses'=>'AdminUsersController@getEdit',
					'as'=>'admin.users.edit',
				])->middleware('users:admin|supermod');

				Route::post('/edit/{page}/{id}',[
					'uses'=>'AdminUsersController@postEdit',
					'as'=>'admin.users.edit',
				])->middleware('users:admin|supermod');

				Route::get('/add',[
					'uses'=>'AdminUsersController@getAdd',
					'as'=>'admin.users.add',
				])->middleware('clandauth:admin|supermod');

				Route::post('/add',[
					'uses'=>'AdminUsersController@postAdd',
					'as'=>'admin.users.add',
				])->middleware('clandauth:admin|supermod');
				
				Route::get('/del/{page}/{id}',[
					'uses'=>'AdminUsersController@del',
					'as'=>'admin.users.del',
				])->middleware('users:admin|supermod');
		});


		Route::prefix('news')->middleware('clandauth:admin|supermod|mod')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminNewsController@index',
				'as'=>'admin.news.index',
			])->middleware('clandauth:admin|supermod|mod');
			Route::get('/edit/{page}/{author}/{id}',[
				'uses'=>'AdminNewsController@getEdit',
				'as'=>'admin.news.edit',
			])->middleware('news:admin|supermod');

			Route::post('/edit/{page}/{author}/{id}',[
				'uses'=>'AdminNewsController@postEdit',
				'as'=>'admin.news.edit',
			])->middleware('news:admin|supermod');

			Route::get('/add',[
				'uses'=>'AdminNewsController@getAdd',
				'as'=>'admin.news.add',
			])->middleware('clandauth:admin|supermod|mod');
			Route::post('/add',[
				'uses'=>'AdminNewsController@postAdd',
				'as'=>'admin.news.add',
			])->middleware('clandauth:admin|supermod|mod');
			Route::get('/del/{page}/{author}/{id}',[
				'uses'=>'AdminNewsController@del',
				'as'=>'admin.news.del',
			])->middleware('news:admin|supermod');
			Route::any('/search',[
				'uses'=>'AdminNewsController@search',
				'as'=>'admin.news.search',
			]);
		});

		Route::prefix('cat')->middleware('clandauth:admin')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminCatController@index',
				'as'=>'admin.cat.index',
			])->middleware('clandauth:admin');
			Route::get('/edit/{id}',[
				'uses'=>'AdminCatController@getEdit',
				'as'=>'admin.cat.edit',
			])->middleware('clandauth:admin');
			Route::post('/edit/{id}',[
				'uses'=>'AdminCatController@postEdit',
				'as'=>'admin.cat.edit',
			])->middleware('clandauth:admin');
			Route::get('/add',[
				'uses'=>'AdminCatController@getAdd',
				'as'=>'admin.cat.add',
			])->middleware('clandauth:admin');
			Route::post('/add',[
				'uses'=>'AdminCatController@postAdd',
				'as'=>'admin.cat.add',
			])->middleware('clandauth:admin');
			Route::get('/del/{id}',[
				'uses'=>'AdminCatController@del',
				'as'=>'admin.cat.del',
			])->middleware('clandauth:admin');
			Route::get('/catChange/{id}',[
				'uses'=>'AdminCatController@catChange',
				'as'=>'admin.cat.catChange',
			])->middleware('clandauth:admin');
			Route::get('/catChange2/{id}',[
				'uses'=>'AdminCatController@catChange2',
				'as'=>'admin.cat.catChange2',
			])->middleware('clandauth:admin');
			Route::any('/search',[
				'uses'=>'AdminCatController@search',
				'as'=>'admin.cat.search',
			])->middleware('clandauth:admin');
			
		});


		Route::prefix('contact')->middleware('clandauth:admin')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminContactController@index',
				'as'=>'admin.contact.index',
			])->middleware('clandauth:admin');
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminContactController@getEdit',
				'as'=>'admin.contact.edit',
			])->middleware('clandauth:admin');
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminContactController@postEdit',
				'as'=>'admin.contact.edit',
			])->middleware('clandauth:admin');
			Route::get('/add',[
				'uses'=>'AdminContactController@getAdd',
				'as'=>'admin.contact.add',
			])->middleware('clandauth:admin');
			Route::post('/add',[
				'uses'=>'AdminContactController@postAdd',
				'as'=>'admin.contact.add',
			])->middleware('clandauth:admin');
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminContactController@del',
				'as'=>'admin.contact.del',
			])->middleware('clandauth:admin');
		});

		Route::prefix('comment')->middleware('clandauth:admin')->group(function(){
			Route::get('/',[
				'uses'=>'AdminCommentController@index',
				'as'=>'admin.comment.index',
			])->middleware('clandauth:admin');
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminCommentController@getEdit',
				'as'=>'admin.comment.edit',
			])->middleware('clandauth:admin');
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminCommentController@postEdit',
				'as'=>'admin.comment.edit',
			])->middleware('clandauth:admin');
			Route::get('/add',[
				'uses'=>'AdminCommentController@getAdd',
				'as'=>'admin.comment.add',
			])->middleware('clandauth:admin');
			Route::post('/add',[
				'uses'=>'AdminCommentController@postAdd',
				'as'=>'admin.comment.add',
			])->middleware('clandauth:admin');
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminCommentController@del',
				'as'=>'admin.comment.del',
			])->middleware('clandauth:admin');
		});




		Route::prefix('rate')->middleware('clandauth:admin')->group(function(){
			Route::get('/',[
				'uses'=>'AdminRateController@index',
				'as'=>'admin.rate.index',
			])->middleware('clandauth:admin');
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminRateController@getEdit',
				'as'=>'admin.rate.edit',
			])->middleware('clandauth:admin');
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminRateController@postEdit',
				'as'=>'admin.rate.edit',
			])->middleware('clandauth:admin');
			Route::get('/add',[
				'uses'=>'AdminRateController@getAdd',
				'as'=>'admin.rate.add',
			])->middleware('clandauth:admin');
			Route::post('/add',[
				'uses'=>'AdminRateController@postAdd',
				'as'=>'admin.rate.add',
			])->middleware('clandauth:admin');
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminRateController@del',
				'as'=>'admin.rate.del',
			])->middleware('clandauth:admin');
		});

	});
});

Route::namespace('Cland')->group(function () {
   	
	   	Route::get('/',[
			'uses'=>'ClandController@index',
			'as'=>'cland.index',
		]);
	   		Route::get('/register',[
			'uses'=>'ClandRegisterController@getRegister',
			'as'=>'cland.register',
		]);
	   		Route::post('/register',[
			'uses'=>'ClandRegisterController@postRegister',
			'as'=>'cland.register',
		]);
	   		Route::get('/login',[
			'uses'=>'ClandLoginController@getLogin',
			'as'=>'cland.login',
		]);
	   		Route::post('/login',[
			'uses'=>'ClandLoginController@postLogin',
			'as'=>'cland.login',
		]);
		Route::get('/logout',[
			'uses'=>'ClandLoginController@logout',
			'as'=>'cland.logout',
		]);
		
		Route::get('/detail/{slug}-{id}.html',[
			'uses'=>'ClandController@detail',
			'as'=>'cland.detail',
		]);
		Route::get('/cat/{slug}-{cid}.html',[
			'uses'=>'ClandController@cat',
			'as'=>'cland.cat',
		]);
		Route::get('/contact',[
			'uses'=>'ClandContactController@getContact',
			'as'=>'cland.contact',
		]);
		Route::post('/contact',[
			'uses'=>'ClandContactController@postContact',
			'as'=>'cland.contact',
		]);
		Route::post('/postComment',[
			'uses'=>'ClandCommentController@postComment',
			'as'=>'cland.postComment',
		]);
		Route::post('/loadReply',[
			'uses'=>'ClandCommentController@loadReply',
			'as'=>'cland.loadReply',
		]);
		Route::post('/postReply',[
			'uses'=>'ClandCommentController@postReply',
			'as'=>'cland.postReply',
		]);
		Route::post('/rate',[
			'uses'=>'ClandRateController@rate',
			'as'=>'cland.rate',
		]);
		Route::get('/confirm',[
			'uses'=>'ClandLoginController@getConfirm',
			'as'=>'cland.confirm',
		]);
		Route::post('/confirm',[
			'uses'=>'ClandLoginController@postConfirm',
			'as'=>'cland.confirm',
		]);
		/*Route::get('/edit/{author}',[
			'uses'=>'ClandLoginController@getEdit',
			'as'=>'cland.edit',
		]);*/
		Route::post('/edit/{author}',[
			'uses'=>'ClandLoginController@postEdit',
			'as'=>'cland.edit',
		]);
		
		Route::get('/search',[
			'uses'=>'ClandController@search',
			'as'=>'cland.search',
		]);


});


