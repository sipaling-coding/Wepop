<?php
Route::get('/', function () {
    return redirect('/home');
});

Route::get('index', function () {
    return redirect('home.index');
});

Route::get('chat', function () {
    return view('chat.forum');
});

Route::get('vnews', function () {
    return view('news.news');
});

Route::get('vkelas', 'KelasController@index');
//Jepang
Route::get('jepang', 'KelasController@jepang');
Route::get('HurufJepang', 'KelasController@hurufjepang');
Route::get('Hiragana', 'KelasController@Hiragana');
Route::get('Katakana', 'KelasController@Katakana');
Route::get('Kanji', 'KelasController@Kanji');
Route::get('SalamJepang', 'KelasController@SalamJepang');
Route::get('Kalimat', 'KelasController@Kalimat');
//Korea   
Route::get('korean', 'KelasController@korea');
Route::get('Hangeul', 'KelasController@Hangeul');
Route::get('VokalHangeul', 'KelasController@VokalHangeul');
Route::get('VokalRangkap', 'KelasController@VokalRangkap');
Route::get('KonsonanHangeul', 'KelasController@KonsonanHangeul');
Route::get('KonsonanRangkap', 'KelasController@KonsonanRangkap');
Route::get('SalamUngkapan', 'KelasController@SalamUngkapan');
Route::get('PolaKalimatKorean', 'KelasController@PolaKalimatKorean');
// Auth::routes();

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('oauth2google', 'Auth\Oauth2Controller@oauth2google')->name('oauth2google');
$this->get('googlecallback', 'Auth\Oauth2Controller@googlecallback')->name('googlecallback');
$this->get('oauth2facebook', 'Auth\Oauth2Controller@oauth2facebook')->name('oauth2facebook');
$this->get('facebookcallback', 'Auth\Oauth2Controller@facebookcallback')->name('facebookcallback');
$this->get('oauth2github', 'Auth\Oauth2Controller@oauth2github')->name('oauth2github');
$this->get('githubcallback', 'Auth\Oauth2Controller@githubcallback')->name('githubcallback');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('tests', 'TestsController');
    Route::resource('jpnews', 'jpnewsController');
    Route::resource('kornews', 'kornewsController');
    Route::resource('index', 'IndexController');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('topics', 'TopicsController');
    Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    Route::resource('questions', 'QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
});