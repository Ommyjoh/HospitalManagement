<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\CreateAppointment;
use App\Http\Livewire\Admin\Appointments\ListAppointment;
use App\Http\Livewire\Admin\Appointments\UpdateAppointment;
use App\Http\Livewire\Admin\Users\ListUsers;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

    Route::get('/admin/users', ListUsers::class)->name('admin.listUsers');

    Route::get('admin/appointments', ListAppointment::class)->name('admin.appointments');

    Route::get('admin/appointments/create', CreateAppointment::class)->name('admin.appointments.create');

    Route::get('admin/appointments/{appointment}/edit', UpdateAppointment::class)->name('admin.appointments.edit');
});