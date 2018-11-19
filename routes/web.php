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

Route::get('/', function () {
    $config['center'] = 'Accra, Ghana';
    $config['zoom'] = '18';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = false;

    GMaps::initialize($config);
    $map = GMaps::create_map();

    return view('welcome')->with('map', $map);
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addnewdrone', 'DroneController@addnewDrone');
Route::get('/manageclientdrone', 'DroneController@viewDrone');
Route::get('/spraylocation', 'DeploymentController@index');
ROUTE::get('/droneDeployment', 'DeploymentController@loadDeployView');
Route::get('/manageDeployment', 'DeploymentController@manageDeployment');

Route::get('/region/{region}', 'CampaignController@index');

Route::get('/deployed/terminate/{owner_id}/{drone_code}', 'DeploymentController@terminateDeployment');
Route::get('/deployment-information/{drone_code}/{deploy_id}/{owner_id}', 'DeploymentInformationController@viewDeploymentInfo');

Route::post('/addnewdrone', 'DroneController@add');
Route::post('/setup-drone-spraylocation', 'SprayController@addSprayLocation')->name('setup-drone-spraylocation');
ROUTE::post('/droneDeployment', 'DeploymentController@setDeployment');
Route::post('/upload-information', 'DeploymentInformationController@uploadinfo')->name('upload_information');
Route::post('/add-campaign', 'CampaignController@addCampaign');
});
