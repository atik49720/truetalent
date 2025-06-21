<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile/update', [UserInfoController::class, 'index'])->name('profile.complete.index');
    Route::post('/profile/update', [UserInfoController::class, 'store'])->name('profile.complete.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/company/all', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::post('/company/verify', [CompanyController::class, 'verify'])->name('company.verify');
    Route::get('/company/{company}', [CompanyController::class, 'single'])->name('company.single');

    Route::get('/company/{company}/jobs', [JobController::class, 'companyWiseJobs'])->name('job.companywise');

    Route::get('/job/{job}/applicants', [JobApplicationController::class, 'applicants'])->name('job.application.applicants');
    Route::get('/job/{job}/apply', [JobApplicationController::class, 'index'])->name('job.application.index');
    Route::post('/job/{job}/apply', [JobApplicationController::class, 'store'])->name('job.application.store');

    Route::get('/job/all', [JobController::class, 'index'])->name('job.index');
    Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
    Route::get('/job/{job}', [JobController::class, 'single'])->name('job.single');
    Route::get('/edit/{job}', [JobController::class, 'edit'])->name('job.edit');
    Route::post('/job/{job}', [JobController::class, 'update'])->name('job.update');

});

require __DIR__.'/auth.php';
