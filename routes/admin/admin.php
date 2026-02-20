<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\FooterInformationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\VehicleAndDriverController;
use App\Models\Admin\VehicleAndDriver;

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'LoginDashboard'])->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin', 'en.locale'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'general-settings'], function () {
        Route::get('', [GeneralSettingsController::class, 'GeneralSettings'])->name('general.settings')->middleware(['permission:cms-list|cms-create|cms-edit|cms-delete']);
        Route::get('/edit/{id}', [GeneralSettingsController::class, 'GeneralSettingsEdit'])->name('general.settings.edit')->middleware(['permission:cms-edit']);
        Route::post('/update', [GeneralSettingsController::class, 'GeneralSettingsUpdate'])->name('general.settings.update')->middleware(['permission:cms-edit', 'isDemo']);
        Route::post('/update-settings', [GeneralSettingsController::class, 'updateSettings'])->name('general.settings.update_settings')->middleware(['permission:cms-edit', 'isDemo']);
        Route::post('/update-social-login', [GeneralSettingsController::class, 'updateSocialLogin'])->name('general.settings.update_social_login')->middleware(['permission:cms-edit', 'isDemo']);
        Route::post('/update-email', [GeneralSettingsController::class, 'updateEmail'])->name('general.settings.update_email')->middleware(['permission:cms-edit', 'isDemo']);
    });

    Route::group(['prefix' => 'profile/'], function () {
        Route::get('', [AdminProfileController::class, 'adminProfile'])->name('profile');
        Route::post('update', [AdminProfileController::class, 'adminProfileUpdate'])->name('profile.update')->middleware(['isDemo']);
        Route::post('change-password', [AdminProfileController::class, 'changePassword'])->name('change_password')->middleware(['isDemo']);
    });

    Route::group(['prefix' => 'footer-information'], function () {
        Route::get('/edit', [FooterInformationController::class, 'footerInformationEdit'])->name('footer.information.edit')->middleware(['permission:cms-list|cms-create|cms-edit|cms-delete']);
        Route::post('/update', [FooterInformationController::class, 'footerInformationUpdate'])->name('footer.information.update')->middleware(['permission:cms-edit', 'isDemo']);
    });

    //User Settings
    Route::get('/admins', [UserController::class, 'adminList'])->name('admin_list')->middleware(['permission:user-list|user-create|user-edit|user-delete']);
    Route::get('/create-admin', [UserController::class, 'createAdmin'])->name('create_admin')->middleware(['permission:user-create']);
    Route::post('/store-admin', [UserController::class, 'storeAdmin'])->name('store_admin')->middleware(['permission:user-create', 'isDemo']);
    Route::get('/edit-admin/{id}', [UserController::class, 'editAdmin'])->name('edit_admin')->middleware(['permission:user-edit']);
    Route::post('/update-admin/{id}', [UserController::class, 'updateAdmin'])->name('update_admin')->middleware(['permission:user-edit', 'isDemo']);
    Route::get('/customers', [UserController::class, 'customerList'])->name('customer_list')->middleware(['permission:user-list|user-create|user-edit|user-delete']);
    Route::get('/customer/{status}/{user_id}', [UserController::class, 'customerStatusChange'])->name('customer_status_change')->middleware(['permission:user-list|user-create|user-edit|user-delete', 'isDemo']);
    Route::get('/admin-status/{id}', [UserController::class, 'statusChange'])->name('status_change')->middleware(['permission:user-list', 'isDemo']);

    //Role Settings
    Route::get('/roles', [RoleController::class, 'index'])->name('role_list')->middleware(['role:Super Admin']);
    Route::get('/create-role', [RoleController::class, 'createRole'])->name('create_role')->middleware(['role:Super Admin']);
    Route::post('/store-role', [RoleController::class, 'storeRole'])->name('store_role')->middleware(['role:Super Admin', 'isDemo']);
    Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit_role')->middleware(['role:Super Admin']);
    Route::post('/update-role/{id}', [RoleController::class, 'updateRole'])->name('update_role')->middleware(['role:Super Admin', 'isDemo']);
    Route::get('/delete-role/{id}', [RoleController::class, 'deleteRole'])->name('delete_role')->middleware(['role:Super Admin', 'isDemo']);


    Route::group(['prefix' => 'vehicle-and-drivers'], function () {
        Route::get('/', [VehicleAndDriverController::class, 'index'])->name('vehicle-and-drivers.index')->middleware(['role:Super Admin']);
        Route::get('/create-vehicle-and-driver', [VehicleAndDriverController::class, 'create'])->name('vehicle-and-drivers.create')->middleware(['role:Super Admin']);
        Route::post('/store-vehicle-and-driver', [VehicleAndDriverController::class, 'store'])->name('vehicle-and-drivers.store')->middleware(['role:Super Admin', 'isDemo']);
        Route::get('/edit-vehicle-and-driver/{id}', [VehicleAndDriverController::class, 'edit'])->name('vehicle-and-drivers.edit')->middleware(['role:Super Admin']);
        Route::post('/update-vehicle-and-driver/{id}', [VehicleAndDriverController::class, 'update'])->name('vehicle-and-drivers.update')->middleware(['role:Super Admin', 'isDemo']);
        Route::get('/delete-vehicle-and-driver/{id}', [VehicleAndDriverController::class, 'delete'])->name('vehicle-and-drivers.delete')->middleware(['role:Super Admin', 'isDemo']);
        Route::get('/vehicle-and-drivers/qrcode/{id}', [VehicleAndDriverController::class, 'generateQrCode'])->name('vehicle-and-drivers.qrcode')->middleware(['role:Super Admin', 'isDemo']);

    });



   









});

