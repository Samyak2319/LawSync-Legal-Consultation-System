<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CaseHistoryController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LawyerController::class, 'index'])->name('home');
Route::view('/ipc', 'ipc')->name('ipc');
Route::view('/contact', 'contact')->name('contact');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Customer + General)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Customer Dashboard
    Route::get('/customer/dashboard', [ProfileController::class, 'dashboard'])
    ->name('customer.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customer Bookings
    Route::get('/my-bookings', [BookingController::class, 'customerBookings'])
        ->name('customer.bookings');

    // Book Lawyer
    Route::post('/book/{lawyer}', [BookingController::class, 'store'])
        ->name('book.lawyer');
});


/*
|--------------------------------------------------------------------------
| Lawyer Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:lawyer'])->group(function () {

    // Dashboard
    Route::get('/lawyer/dashboard', [LawyerController::class, 'dashboard'])
        ->name('lawyer.dashboard');

    // Profile CRUD
    Route::get('/lawyer/profile/create', [LawyerController::class, 'create'])
        ->name('lawyer.create');

    Route::post('/lawyer/profile/store', [LawyerController::class, 'store'])
        ->name('lawyer.store');

    Route::get('/lawyer/profile/edit', [LawyerController::class, 'edit'])
        ->name('lawyer.edit');

    Route::post('/lawyer/profile/update', [LawyerController::class, 'update'])
        ->name('lawyer.update');

    // Booking Actions
    Route::post('/booking/{id}/accept', [BookingController::class, 'accept'])
        ->name('booking.accept');

    Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])
        ->name('booking.reject');
    
    // Case History
    Route::post('/lawyer/case-history/store', [CaseHistoryController::class, 'store'])
        ->name('case.history.store');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Users
    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.user.delete');

    // Lawyers
    Route::get('/admin/lawyers', [AdminController::class, 'lawyers'])
    ->name('admin.lawyers');
    Route::get('/admin/lawyer/{id}', [AdminController::class, 'showLawyer'])->name('admin.lawyer.show');
    
    Route::post('/admin/lawyer/{id}/approve', [AdminController::class, 'approveLawyer'])
        ->name('admin.lawyer.approve');

    Route::delete('/admin/lawyer/{id}', [AdminController::class, 'deleteLawyer'])
        ->name('admin.lawyer.delete');
    
    

    // Bookings
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])
        ->name('admin.bookings');

    Route::delete('/admin/booking/{id}', [AdminController::class, 'cancelBooking'])
        ->name('admin.booking.delete');
});

/*
|--------------------------------------------------------------------------
| Review Routes 
|--------------------------------------------------------------------------
*/
Route::post('/lawyer/{id}/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');

/*
|--------------------------------------------------------------------------
| Public Dynamic Routes 
|--------------------------------------------------------------------------
*/

Route::get('/lawyer/{id}', [LawyerController::class, 'show'])
    ->where('id', '[0-9]+') // prevents dashboard conflict
    ->name('lawyer.show');

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';