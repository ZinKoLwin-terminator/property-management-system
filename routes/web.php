<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AMCController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);

Route::post('login_post', [AuthController::class, 'login_post']);

Route::get('register', [AuthController::class, 'register']);

Route::post('register', [AuthController::class, 'register_post']);


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);
    Route::get('admin/amc/list', [AMCController::class, 'amc_list']);
    Route::get('admin/amc/add', [AMCController::class, 'amc_add']);
    Route::post('admin/amc/add', [AMCController::class, 'amc_insert']);

    Route::get('admin/amc/edit/{id}', [AMCController::class, 'amc_edit']);
    Route::post('admin/amc/edit/{id}', [AMCController::class, 'amc_update']);

    Route::get('admin/amc/delete/{id}', [AMCController::class, 'amc_delete']);

    Route::get('admin/amc/add_ons/{id}', [AMCController::class, 'amc_add_ons_list']);
    Route::get('admin/amc/add_add_ons/{id}', [AMCController::class, 'amc_add_add_ons']);

    Route::post('admin/amc/add_add_ons/{id}', [AMCController::class, 'amc_store__add_ons']);
    Route::get('admin/amc/edit_add_ons/{id}', [AMCController::class, 'amc_edit__add_ons']);
    Route::post('admin/amc/edit_add_ons/{id}', [AMCController::class, 'amc_update_add_ons']);
    Route::get('admin/amc/delete_add_ons/{id}', [AMCController::class, 'delete_add_ons']);

    Route::get('admin/amc/free_service/{id}', [AMCController::class, 'amc_free_service']);
    Route::get('admin/amc/add_free_service/{id}', [AMCController::class, 'amc_add_free_service']);
    Route::post('admin/amc/add_free_service/{id}', [AMCController::class, 'amc_store_free_service']);
    Route::get('admin/amc/edit_free_service/{id}', [AMCController::class, 'amc_edit_free_service']);
    Route::post('admin/amc/edit_free_service/{id}', [AMCController::class, 'amc_update_free_service']);

    Route::get('admin/amc/delete_free_service/{id}', [AMCController::class, 'amc_delete_free_service']);


    //category

    Route::get('admin/category/list', [CategoryController::class, 'category_list']);
    Route::get('admin/category/add', [CategoryController::class, 'category_add']);
    Route::post('admin/category/add', [CategoryController::class, 'category_insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'category_edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'category_update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'category_delete']);

    //service type

    Route::get('admin/service_type/list', [ServiceTypeController::class, 'service_type_list']);
    Route::get('admin/service_type/add', [ServiceTypeController::class, 'service_type_add']);
    Route::post('admin/service_type/add', [ServiceTypeController::class, 'service_type_add_post']);
    Route::get('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_edit']);
    Route::post('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_edit_update']);
    Route::get('admin/service_type/delete/{id}', [ServiceTypeController::class, 'service_type_delete']);

    //sub_category
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'sub_category_list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'sub_category_add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'sub_category_store']);
});

Route::group(['middleware' => 'user'], function () {

    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);
});

Route::group(['middleware' => 'vendor'], function () {

    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);
});

Route::get('logout', [AuthController::class, 'logout']);