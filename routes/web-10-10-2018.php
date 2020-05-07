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
URL::forceScheme('https');
// Backend

Route::get('check', ['as' => 'check', 'uses' => 'LoginController@index']);

Route::get('blogs', ['as' => 'blogs', 'uses' => 'frontend\BlogsController@index']);

Route::get('blog/{slug}', ['as' => 'blog', 'uses' => 'frontend\BlogsController@details']);

Route::group(['namespace' => 'backend'], function () {
    // Auth
    Route::get('admin', 'LoginController@index');
    Route::post('admin/login', ['as' => 'backend.login', 'uses' => 'LoginController@login']);
    Route::get('admin/logout', ['as' => 'backend.logout', 'uses' => 'LoginController@logout']);

    // Dashboard
    Route::get('admin/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('search', ['as' => 'search.user', 'uses' => 'UsersController@search']);
    // Dashboard Credit Filter for campaign - Ranveer
    Route::get('admin/dashboard/search', ['as' => 'search.dashboard', 'uses' => 'DashboardController@search']);
    Route::get('admin/dashboard/delete/{id}', ['as' => 'destroy.dashboard', 'uses' => 'DashboardController@destroy']);

    // Users
    Route::resource('admin/users', 'UsersController');
    Route::get('admin/users/status/{id}', ['as' => 'users.status', 'uses' => 'UsersController@status']);
    Route::get('admin/users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@destroy']);

    // Profile
    Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'AccountController@edit']);
    Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'AccountController@update']);

    // Pages
    Route::resource('admin/pages', 'PagesController');
    Route::get('admin/pages/delete/{id}', ['as' => 'pages.delete', 'uses' => 'PagesController@destroy']);

    // Banners
    Route::resource('admin/banners', 'BannersController');
    Route::get('admin/banners/delete/{id}', ['as' => 'banners.delete', 'uses' => 'BannersController@destroy']);

    //Blogs
    Route::resource('admin/blogs', 'BlogsController');

    Route::get('admin/blogs/delete/{id}', ['as' => 'blogs.delete', 'uses' => 'BlogsController@destroy']);

    //Payment
    Route::get('admin/payments', ['as' => 'admin.payments', 'uses' => 'AdminPaymentsController@index']);

    // Route::get('admin/blogs/delete/{id}', ['as' => 'blogs.delete', 'uses' => 'BlogsController@destroy']);

    // Search
    Route::get('admin/search', ['as' => 'backend.search', 'uses' => 'SearchController@index']);

    // Settings
    Route::get('admin/settings', ['as' => 'settings.edit', 'uses' => 'SettingsController@edit']);
    Route::put('admin/settings/update', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
});

Route::any('foo', function () {

});

Route::get('account-activation/{token}', ['as' => 'acc_activation', 'uses' => 'frontend\Auth\AuthController@userActivation']);

Route::post('send-email', ['as' => 'send-email', 'uses' => 'frontend\HomeController@send_email']);

Route::get('/', ['as' => 'home', 'uses' => 'frontend\HomeController@index']);
// Route::get('{page}', 'PagesController@index');

Route::get('faq', ['as' => 'pages.duk', 'uses' => 'frontend\PagesController@duk1']);
Route::get('contact', ['as' => 'pages.kontaktai', 'uses' => 'frontend\PagesController@kontaktai1']);
Route::get('naudojimosi-taisykles1', ['as' => 'pages.naudojimosi-taisykles', 'uses' => 'frontend\PagesController@naudojimosi_taisykles1']);
Route::get('terms-conditions', ['as' => 'pages.terms-condition', 'uses' => 'frontend\PagesController@terms_condition']);

// Frontend
Route::post('paypal', ['as' => 'pay_money', 'uses' => 'PaymentController@payWithpaypal']);
Route::get('status', 'PaymentController@getPaymentStatus');


Route::group(['namespace' => 'frontend'], function () {
    // Payments
    Route::resource('payments', 'PaymentsController');
    Route::get('payments/delete/{id}', ['as' => 'payments.destroy', 'uses' => 'BackPaymentsController@destroy']);

    // Kreditai
    Route::get('my-credits', ['as' => 'credits', 'uses' => 'CreditsController@index']);

    // route for check status of the payment

    // Apmokėjimas
    Route::get('apmoketa', ['as' => 'payments.success', 'uses' => 'PaymentsController@success']);
    Route::get('mokejimas-atsauktas', ['as' => 'payments.cancel', 'uses' => 'PaymentsController@cancel']);
    Route::post('payment-callback', ['as' => 'payments.callback', 'uses' => 'PaymentsController@callback']);

    // Mano anketos
    Route::get('my_surveys', ['as' => 'campaigns.my', 'uses' => 'CampaignsController@my']);
    Route::get('create-survey', ['as' => 'campaigns.create', 'uses' => 'CampaignsController@create']);
    Route::post('create-survey', ['as' => 'campaigns.store', 'uses' => 'CampaignsController@store']);
    Route::get('istrinti-anketa/{id}', ['as' => 'campaigns.destroy', 'uses' => 'CampaignsController@destroy']);

    Route::get('survey/{id}/settings', ['as' => 'campaigns.edit', 'uses' => 'CampaignsController@edit']);
    Route::post('survey/{id}/settings', ['as' => 'campaigns.update', 'uses' => 'CampaignsController@update']);

    Route::get('anketa/{id}/kopijuoti', ['as' => 'campaigns.copy', 'uses' => 'CampaignsController@copy']);

    Route::get('anketa/{id}/deaktyvuoti', ['as' => 'campaigns.deactivate', 'uses' => 'CampaignsController@deactivate']);

    Route::get('survey/{id}/questions', ['as' => 'campaigns.questions', 'uses' => 'CampaignsController@questions']);

    Route::get('anketa/{id}/rezultatai', ['as' => 'campaigns.results', 'uses' => 'CampaignsController@results']);
    Route::post('anketa/{id}/rezultatai/poriniai-stebejimai', ['as' => 'campaigns.cross_tabulation', 'uses' => 'CampaignsController@cross_tabulation']);
    Route::post('anketa/{id}/rezultatai/koreliacine-analize', ['as' => 'campaigns.correlation', 'uses' => 'CampaignsController@correlation_analysis']);
    Route::post('anketa/{id}/rezultatai/regresine-analize', ['as' => 'campaigns.regression', 'uses' => 'CampaignsController@regression_analysis']);
    Route::get('anketa/{id}/rezultatai/xlsx', ['as' => 'campaigns.results.xlsx', 'uses' => 'CampaignsController@results_xlsx']);

    Route::get('anketa/{id}/klausimai/prideti-klausima/{type}', ['as' => 'campaigns.questions.add', 'uses' => 'CampaignsController@add_question']);
    Route::post('anketa/{id}/klausimai/prideti-klausima/{type}', ['as' => 'campaigns.questions.store', 'uses' => 'CampaignsController@store_question']);

    Route::get('anketa/{id}/klausimai/redaguoti-klausima/{question_id}', ['as' => 'campaigns.questions.edit', 'uses' => 'CampaignsController@edit_question']);
    Route::post('anketa/{id}/klausimai/redaguoti-klausima/{question_id}', ['as' => 'campaigns.questions.update', 'uses' => 'CampaignsController@update_question']);

    Route::get('anketa/{id}/klausimai/istrinti-klausima/{question_id}', ['as' => 'campaigns.questions.destroy', 'uses' => 'CampaignsController@destroy_question']);

    // Atsakymai į anketą
    //  Route::get('anketos-pildymas/{id}', ['as' => 'campaigns.answer', 'uses' => 'CampaignsController@answer']);
    Route::post('anketos-pildymas/{id}', ['as' => 'campaigns.answer.store', 'uses' => 'CampaignsController@store_answer']);
    Route::get('anketa-nerasta', ['as' => 'campaigns.notfound', 'uses' => 'CampaignsController@notfound']);
    Route::get('anketa-uzpildyta', ['as' => 'campaigns.answered', 'uses' => 'CampaignsController@answered']);

    // yusuf j
    Route::get('anketos-pildymas/{id}', ['as' => 'campaigns.answer', 'uses' => 'CampaignsController@answer']);
    // Anketos rezultatai
    Route::get('anketos-rezultatai/{id}', ['as' => 'campaigns.answers', 'uses' => 'CampaignsController@answers']);

    // Anketų sąrašas
    Route::get('anketu-sarasas', ['as' => 'campaigns', 'uses' => 'CampaignsController@index']);
    Route::get('anketu-paieska', ['as' => 'campaigns.search', 'uses' => 'CampaignsController@search']);

    // Paskyros nustatymai
    Route::get('paskyros-nustatymai', ['as' => 'account.index', 'uses' => 'AccountController@index']);
    Route::post('paskyros-nustatymai', ['as' => 'account.update', 'uses' => 'AccountController@update']);

    // Password forgot
    Route::get('remember-password', ['as' => 'password.remind', 'uses' => 'RemindersController@getRemind']);
    Route::post('remember-password', ['as' => 'password.remind.post', 'uses' => 'RemindersController@postRemind']);
    Route::get('atkurti-slaptazodi/{token}', ['as' => 'password.reset', 'uses' => 'RemindersController@getReset']);
    Route::post('atkurti-slaptazodi', ['as' => 'password.reset.post', 'uses' => 'RemindersController@postReset']);
    Route::get('slaptazodis-pakeistas', ['as' => 'password.success', 'uses' => 'RemindersController@success']);

    // Login & Registration
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@index']);
    Route::get('register', ['as' => 'login.registration', 'uses' => 'LoginController@registration']);
    Route::post('registruotis', ['as' => 'login.register', 'uses' => 'Auth\AuthController@register']);
    Route::post('prisijungti', ['as' => 'login.session', 'uses' => 'Auth\AuthController@login']);
    Route::get('atsijungti', ['as' => 'login.logout', 'uses' => 'LoginController@logout']);
    Route::get('registruotis/facebook', ['as' => 'login.register_facebook', 'uses' => 'LoginController@redirectToFacebook']);
    Route::get('registruotis/facebook/callback', 'LoginController@handleFacebookCallback');
    Route::get('registruotis/google', ['as' => 'login.register_google', 'uses' => 'LoginController@redirectToGoogle']);
    Route::get('registruotis/google/callback', 'LoginController@handleGoogleCallback');

    // OAuth Routes
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

    // Pages

});
