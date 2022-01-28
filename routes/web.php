<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [SiteController::class, 'index'])->name('dashboard');
Route::get('/shorturls', [SiteController::class, 'shortUrls'])->name('shortUrls');
Route::get('/reseturls', [SiteController::class, 'resetShortUrls'])->name('resetShortUrls');
Route::get('/crawtitles', [SiteController::class, 'crawlTitles'])->name('crawlTitles');

require __DIR__.'/auth.php';
