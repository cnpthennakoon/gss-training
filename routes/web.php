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
    return view('auth.login');
});

Auth::routes();

Route::prefix('daily-evaluations')->group(function (){
    Route::get('/', 'DailyEvaluationsDashboardController@index')->name('daily-evaluations');
    Route::resource('/daily-audits', 'DailyEvaluationsController');
});

Route::prefix('audits')->group(function (){
    Route::resource('/audits', 'AuditsController');
    Route::get('/submit-data/{audit}', 'AuditsController@submit_audit')->name('audits.submit_audit');
    Route::resource('/project-summary', 'DailyEvaluationProjectSummaryController');
    Route::resource('/global-project-summary', 'DailyEvaluationGlobalProjectSummaryController');
});
Route::prefix('training')->group(function (){
    Route::get('/', 'TrainingDashboardController@index')->name('training-dashboard');
    Route::get('/training-summary', 'TrainingCentersSummaryController@index')->name('training-summary');
    Route::resource('/training-batch', 'TrainingBatchesController');
});

    Route::resource('/qat-shortfall', 'QatShortfallController');
    Route::resource('/attrition', 'AttritionController');
    Route::get('/ajax-training-batches', 'AttritionController@findBatch');

Route::prefix('master-data')->group(function (){
    Route::get('/', 'MasterDataDashboardController@index')->name('master-data');
    Route::resource('/country', 'CountriesController');
    Route::resource('/region', 'RegionsController');
    Route::resource('/manufacturer', 'ManufacturersController');
    Route::resource('/global-project', 'GlobalProjectsController');
    Route::resource('/project', 'ProjectsController');
    Route::resource('/image-flaw', 'ImageFlawsController');
    Route::resource('/error-type', 'ErrorTypesController');
    Route::resource('/responsibility', 'ResponsibilitiesController');
    Route::resource('/training-project-status', 'TrainingProjectStatusController');
    Route::resource('/training-center', 'TrainingCentersController');
    Route::resource('/training-batch-status', 'TrainingBatchStatusController');
    Route::resource('/training-batch-type', 'TrainingBatchTypesController');
    Route::resource('/attrition-type', 'AttritionTypesController');
    Route::resource('/attrition-reason', 'AttritionReasonsController');
    Route::resource('/training-nature', 'TrainingNaturesController');
    Route::get('/ajax-training-nature', 'TrainingNaturesController@findTrainingNature');
});

Route::get('/home', 'HomeController@index')->name('home');

