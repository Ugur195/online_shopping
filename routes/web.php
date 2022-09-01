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
// front end
Route::get('/', 'HomeGetController@home');
Route::get('/index', 'HomeGetController@home');
Route::get('/contact_us', 'HomeGetController@getContact_us');
Route::get('/product/{id}', 'HomeGetController@getSingleProduct');
Route::get('/brands', 'HomeGetController@getBrands');
Route::get('/brands_products/{id}', 'HomeGetController@getBrandsProduct');
Route::get('/categoryes', 'HomeGetController@getCategoryes');
Route::get('/categoryes_products/{id}', 'HomeGetController@getCategoryesProduct');
Route::get('/about_us', 'HomeGetController@getAboutUs');
Route::get('/sign_in', 'HomeGetController@getSignIn');
Route::get('/sign_up', 'HomeGetController@getSignUp');
Route::get('/logout', 'HomeGetController@getLogout');
Route::get('/my_profile', 'HomeGetController@getMyProfile');
Route::get('/change_password', 'HomeGetController@getChangePassword');
Route::get('/our_team', 'HomeGetController@getOurTeam');
Route::get('/my_basket', 'HomeGetController@getMyBasket');
Route::get('/check_out', 'HomeGetController@getCheckOut');
Route::get('/my_basket_edit/{id}', 'HomeGetController@getMyBasketEdit');
Route::get('/purchased_goods', 'HomeGetController@getPurchasedGoods');
Route::get('/blogs', 'HomeGetController@getBlogs');
Route::get('/blogs_user/{id}', 'HomeGetController@getBlogsUser');
Route::get('/blogs_categoryes/{id}', 'HomeGetController@getCategoryesBlogs');
Route::get('/single_blog/{id}', 'HomeGetController@getSingleBlog');







Route::post('/contact_us', 'HomePostController@postContact_us');
Route::post('/product/{id}', 'HomePostController@postCommentAndBasket');
Route::post('/my_profile', 'HomePostController@postMyProfile');
Route::post('/change_password', 'HomePostController@postChangePassword');
Route::post('/my_basket', 'HomePostController@postDeleteMyBasket');
Route::post('/my_basket_edit/{id}', 'HomePostController@postMyBasketEdit');
Route::post('/check_out', 'HomePostController@postCheckOut');
Route::post('/purchased_goods', 'HomePostController@postPurchasedGoodsDelete');
Route::post('/single_blog/{id}', 'HomePostController@postBlogsComments');
Route::post('/locale', 'HomePostController@postLocale');






//adminCss


Route::group(['prefix'=>'admin','middleware'=>'Admin'],function (){
    Route::get('/index', 'AdminGetController@home');
    Route::get('/messages', 'AdminGetController@getMessages');
    Route::get('/setting', 'AdminGetController@getSetting');
    Route::get('/messages/{id}', 'AdminGetController@getMessage');
    Route::get('/menu', 'AdminGetController@getMenu');
    Route::get('/menu_edit/{id}', 'AdminGetController@getMenuEdit');
    Route::get('/brands', 'AdminGetController@getBrands');
    Route::get('/add_brand', 'AdminGetController@getAddBrands');
    Route::get('/brand_edit/{id}', 'AdminGetController@getBrandEdit');
    Route::get('/add_menu', 'AdminGetController@getAddMenu');
    Route::get('/categoryes', 'AdminGetController@getCategoryes');
    Route::get('/add_categoryes', 'AdminGetController@getAddCategoryes');
    Route::get('/categoryes_edit/{id}', 'AdminGetController@getCategoryesEdit');
    Route::get('/slideshows', 'AdminGetController@getSlideshows');
    Route::get('/slideshow_edit/{id}', 'AdminGetController@getSlideshowEdit');
    Route::get('/add_slideshow', 'AdminGetController@getAddSlideshow');
    Route::get('/products', 'AdminGetController@getProducts');
    Route::get('/product_edit/{id}', 'AdminGetController@getProductEdit');
    Route::get('/add_product', 'AdminGetController@getAddProduct');
    Route::get('/comments', 'AdminGetController@getComments');
    Route::get('/comment/{id}', 'AdminGetController@getComment');
    Route::get('/about_us', 'AdminGetController@getAboutUs');
    Route::get('/my_profile', 'AdminGetController@getMyProfile');
    Route::get('/change_password', 'AdminGetController@getChangePassword');
    Route::get('/users', 'AdminGetController@getUsers');
    Route::get('/user_edit/{id}', 'AdminGetController@getUserEdit');
    Route::get('/add_users', 'AdminGetController@getAddUsers');
    Route::get('/our_team', 'AdminGetController@getOurTeam');
    Route::get('/add_our_team', 'AdminGetController@getAddOurTeam');
    Route::get('/our_team_edit/{id}', 'AdminGetController@getOurTeamEdit');
    Route::get('/our_team_roles', 'AdminGetController@getOurTeamRoles');
    Route::get('/add_our_team_roles', 'AdminGetController@getAddOurTeamRoles');
    Route::get('/our_team_roles_edit/{id}', 'AdminGetController@getOurTeamRolesEdit');
    Route::get('/orders', 'AdminGetController@getOrders');
    Route::get('/orders_edit/{id}', 'AdminGetController@getOrdersEdit');
    Route::get('/reports', 'AdminGetController@getReports');
    Route::get('/monthly_report', 'AdminGetController@getMonthlyReport');
    Route::get('/blogs', 'AdminGetController@getBlogs');
    Route::get('/add_blogs', 'AdminGetController@getAddBlogs');
    Route::get('/blogs_edit/{id}', 'AdminGetController@getBlogsEdit');
    Route::get('/blog_category', 'AdminGetController@getBlogCategory');
    Route::get('/add_blog_category', 'AdminGetController@getAddBlogCategory');
    Route::get('/blog_category_edit/{id}', 'AdminGetController@getBlogCategoryEdit');
    Route::get('/blogs_comments', 'AdminGetController@getBlogsComments');
    Route::get('/blogs_comments_edit/{id}', 'AdminGetController@getBlogsCommentsEdit');










    Route::post('/slideshow_edit/{id}', 'AdminPostController@postSlideshowEdit');
    Route::post('/add_slideshow', 'AdminPostController@postAddSlideshow');
    Route::post('/product_edit/{id}', 'AdminPostController@postProductEdit');
    Route::post('/add_product', 'AdminPostController@postAddProduct');
    Route::post('/categoryes_edit/{id}', 'AdminPostController@postCategoryesEdit');
    Route::post('/add_categoryes', 'AdminPostController@postAddCategoryes');
    Route::post('/add_menu', 'AdminPostController@postAddMenu');
    Route::post('/brand_edit/{id}', 'AdminPostController@postBrandEdit');
    Route::post('/add_brand', 'AdminPostController@postAddBrands');
    Route::post('/menu_edit/{id}', 'AdminPostController@postMenuEdit');
    Route::post('/setting', 'AdminPostController@postSetting');
    Route::post('/messages', 'AdminPostController@postDeleteMessage');
    Route::post('/messages/{id}', 'AdminPostController@postMessage');
    Route::post('/brands', 'AdminPostController@postDeleteBrand');
    Route::post('/categoryes', 'AdminPostController@postDeleteCategory');
    Route::post('/slideshows', 'AdminPostController@PostDeleteSlideshow');
    Route::post('/menu', 'AdminPostController@postDeleteMenu');
    Route::post('/products', 'AdminPostController@postDeleteProduct');
    Route::post('/comment/{id}', 'AdminPostController@postCommentEdit');
    Route::post('/comments', 'AdminPostController@postCommentPublishOrDelete');
    Route::post('/about_us', 'AdminPostController@postAboutUs');
    Route::post('/my_profile', 'AdminPostController@postMyProfileEdit');
    Route::post('/change_password', 'AdminPostController@postChangePassword');
    Route::post('/users', 'AdminPostController@postUserDelete');
    Route::post('/user_edit/{id}', 'AdminPostController@postUserEdit');
    Route::post('/add_users', 'AdminPostController@postAddUsers');
    Route::post('/our_team', 'AdminPostController@postDeleteOurTeam');
    Route::post('/add_our_team', 'AdminPostController@postAddOurTeam');
    Route::post('/add_our_team_roles', 'AdminPostController@postAddOurTeamRoles');
    Route::post('/our_team_roles', 'AdminPostController@postOurTeamRoles');
    Route::post('/our_team_edit/{id}', 'AdminPostController@postOurTeamEdit');
    Route::post('/our_team_roles', 'AdminPostController@postDeleteOurTeamRoles');
    Route::post('/our_team_roles_edit/{id}', 'AdminPostController@postOurTeamRolesEdit');
    Route::post('/orders', 'AdminPostController@postOrdersDelete');
    Route::post('/orders_edit/{id}', 'AdminPostController@postOrdersEdit');
    Route::post('/add_blogs', 'AdminPostController@postAddBlogs');
    Route::post('/add_blog_category', 'AdminPostController@postAddBlogCategory');
    Route::post('/blog_category_edit/{id}', 'AdminPostController@postBlogCategoryEdit');
    Route::post('/blog_category', 'AdminPostController@postDeleteBlogCategory');
    Route::post('/blogs_edit/{id}', 'AdminPostController@postBlogsEdit');
    Route::post('/blogs', 'AdminPostController@postDeleteBlogs');
    Route::post('/monthly_report', 'AdminPostController@postMonthlyReport');
    Route::post('/blogs_comments', 'AdminPostController@postBlogsCommentsPublishOrDelete');
    Route::post('/blogs_comments_edit/{id}', 'AdminPostController@postBlogsCommentsEdit');
    Route::post('/delete_image', 'AdminPostController@postDeleteImageFromProduct');



});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
