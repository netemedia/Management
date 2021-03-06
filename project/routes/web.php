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

Route::get('/', 'DashboardController')->name('dashboard');
Route::post('/', 'DashboardController');
Route::get('analytics', 'AnalyticsController')->name('analytics');
Route::get('agenda', 'AgendaController')->name('agenda');
Route::resource('clients', 'ClientController');
Route::resource('projects', 'ProjectController');
Route::resource('resources', 'ResourceController');
Route::resource('tasks', 'TaskController');
Route::resource('reports', 'ReportController')->only(['show', 'edit', 'update', 'destroy']);
Route::get('projects/{project}/create/report', 'ReportController@create')
    ->name('reports.create');
Route::post('projects/{project}/create/report', 'ReportController@store')
    ->name('reports.store');
Route::post('status/{task}', 'Task\StatusController')->name('status');

Auth::routes(['register' => false]);

