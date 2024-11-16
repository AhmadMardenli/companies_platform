<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Route;

// company's routes 

//get all companies 
Route::get('/companies', [PlatformController::class,'index']);

//add a branch to a certain company 
Route::post('/company/addbranch',[BranchController::class,'add']);

//show all available branches in a company 
Route::get('/company/{id}', [PlatformController::class,'show']);

//add a company
Route::post('/add',[PlatformController::class,'addCompany']);

//a branch produces a product
Route::post('/branch/produce',[BranchController::class,'produce']);

//a major branch distirbutes product to a secondary branch
Route::post('/branch/distirbute',[BranchController::class,'distirbute']);

//get the quantity produced in a certain amount of time 
Route::get('/branch/record',[BranchController::class,'getProductionRecord']);
