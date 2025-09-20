<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Theme toggle
Route::post('/theme/toggle', function (Request $request) {
    $current = session('theme', 'light');
    session(['theme' => $current === 'light' ? 'dark' : 'light']);
    return back();
})->name('theme.toggle');

// Routes auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Documents
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/share', [DocumentController::class, 'sharePage'])->name('documents.sharePage');
    Route::post('/documents/{document}/share', [DocumentController::class, 'share'])->name('documents.share');
    Route::get('/documents/access', [DocumentController::class, 'accessPage'])->name('documents.accessPage');
    Route::post('/documents/access', [DocumentController::class, 'accessDocument'])->name('documents.access');

    // Organization
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::get('/organization/{organization}/invite', [OrganizationController::class, 'invitePage'])->name('organization.invitePage');
    Route::post('/organizations/{organization}/invite', [OrganizationController::class, 'invite'])->name('organization.invite');
    Route::post('/invite/{token}', [OrganizationController::class, 'acceptInvite'])->name('organization.acceptInvite');

    // Admin-only
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/members', [AdminController::class, 'indexMembers'])->name('admin.members');
        Route::get('/admin/documents', [AdminController::class, 'indexDocuments'])->name('admin.documents');
    });
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
