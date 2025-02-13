<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getIndex']);
Route::controller(CreateController::class)->group(function(){
    Route::get('/create',  'getIndex');
    Route::post('/create-employee', 'AddEmployee');
    Route::get('/edit/{id}', 'getEdit');
    Route::post('/edit-employee/{id}', 'EditEmployee');
    Route::delete('/delete/{id}','DeleteEmployee');

});

