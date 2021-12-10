<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bac\AwardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Bac\ProceedController;
use App\Http\Controllers\Bac\BullitenController;
use App\Http\Controllers\Bac\TimelineController;
use App\Http\Controllers\Records\OrderController;
use App\Http\Controllers\Bac\InvitationController;
use App\Http\Controllers\Records\NumMemoController;
use App\Http\Controllers\Planning\PrivateController;
use App\Http\Controllers\Records\UnNumMemoController;
use App\Http\Controllers\Planning\SecondaryController;
use App\Http\Controllers\Records\AdvisoriesController;
use App\Http\Controllers\Planning\ElementaryController;
use App\Http\Controllers\Planning\IntegratedController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

//Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

// Auth route for both
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});

// for admin
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    // for download the file
    Route::get('memodownload{file}', [NumMemoController::class,'download'])->name('memodownload.download');
    Route::get('advisorydownload{file}', [AdvisoriesController::class,'download'])->name('advisorydownload.download');
    Route::get('unnummemodownload{file}', [UnNumMemoController::class,'download'])->name('unnummemodownload.download');
    Route::get('orderdownload{file}', [UnNumMemoController::class,'download'])->name('orderdownload.download');
    Route::get('invitationdownload{file}', [InvitationController::class,'download'])->name('invitationdownload.download');
    Route::get('timelinedownload{file}', [InvitationController::class,'download'])->name('timelinedownload.download');
    Route::get('awarddownload{file}', [AwardController::class,'download'])->name('awarddownload.download');
    Route::get('bullitendownload{file}', [BullitenController::class,'download'])->name('bullitendownload.download');
    Route::get('proceeddownload{file}', [ProceedController::class,'download'])->name('proceeddownload.download');
    // for add edit and delete data
    Route::resource('dashboard/users', UserController::class);
    Route::resource('dashboard/memo', NumMemoController::class);
    Route::resource('dashboard/advisory', AdvisoriesController::class);
    Route::resource('dashboard/unnummemo', UnNumMemoController::class);
    Route::resource('dashboard/order', OrderController::class);
    Route::resource('dashboard/invitation', InvitationController::class);
    Route::resource('dashboard/timeline', TimelineController::class);
    Route::resource('dashboard/award', AwardController::class);
    Route::resource('dashboard/proceed', ProceedController::class);
    Route::resource('dashboard/bulliten', BullitenController::class);
    Route::resource('dashboard/elementary', ElementaryController::class);
    Route::resource('dashboard/secondary', SecondaryController::class);
    Route::resource('dashboard/integrated', IntegratedController::class);
    Route::resource('dashboard/private', PrivateController::class);
    // for routing
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/dashboard/memo', [NumMemoController::class, 'index'])->name('dashboard.memo');
    Route::get('/dashboard/advisory', [AdvisoriesController::class, 'index'])->name('dashboard.advisory');
    Route::get('/dashboard/unnummemo', [UnNumMemoController::class, 'index'])->name('dashboard.unnummemo');
    Route::get('/dashboard/order', [OrderController::class, 'index'])->name('dashboard.order');
    Route::get('/dashboard/invitation', [InvitationController::class, 'index'])->name('dashboard.invitation');
    Route::get('/dashboard/timeline', [TimelineController::class, 'index'])->name('dashboard.timeline');
    Route::get('/dashboard/award', [AwardController::class, 'index'])->name('dashboard.award');
    Route::get('/dashboard/proceed', [ProceedController::class, 'index'])->name('dashboard.proceed');
    Route::get('/dashboard/bulliten', [BullitenController::class, 'index'])->name('dashboard.bulliten');
    Route::get('/dashboard/elementary', [ElemetaryController::class, 'index'])->name('dashboard.elementary');

    Route::get('/dashboard/secondary', [SecondaryController::class, 'index'])->name('dashboard.secondary');
    Route::get('/dashboard/integrated', [IntegratedController::class, 'index'])->name('dashboard.integrated');
    Route::get('/dashboard/private', [PrivateController::class, 'index'])->name('dashboard.private');
});

// for record
Route::group(['middleware' => ['auth', 'role:record|admin']], function(){
    // for download the file
    Route::get('memodownload{file}', [NumMemoController::class,'download'])->name('memodownload.download');
    Route::get('advisorydownload{file}', [AdvisoriesController::class,'download'])->name('advisorydownload.download');
    Route::get('unnummemodownload{file}', [UnNumMemoController::class,'download'])->name('unnummemodownload.download');
    Route::get('orderdownload{file}', [UnNumMemoController::class,'download'])->name('orderdownload.download');
    // for add edit and delete data
    Route::resource('dashboard/memo', NumMemoController::class);
    Route::resource('dashboard/advisory', AdvisoriesController::class);
    Route::resource('dashboard/unnummemo', UnNumMemoController::class);
    Route::resource('dashboard/order', OrderController::class);
    // for routing
    Route::get('/dashboard/memo', [NumMemoController::class, 'index'])->name('dashboard.memo');
    Route::get('/dashboard/advisory', [AdvisoriesController::class, 'index'])->name('dashboard.advisory');
    Route::get('/dashboard/unnummemo', [UnNumMemoController::class, 'index'])->name('dashboard.unnummemo');
    Route::get('/dashboard/order', [OrderController::class, 'index'])->name('dashboard.order');
});

// for bac
Route::group(['middleware' => ['auth', 'role:bac|admin']], function(){
    // for download file
    Route::get('invitationdownload{file}', [InvitationController::class,'download'])->name('invitationdownload.download');
    Route::get('timelinedownload{file}', [TimelineController::class,'download'])->name('timelinedownload.download');
    Route::get('awarddownload{file}', [AwardController::class,'download'])->name('awarddownload.download');
    Route::get('bullitendownload{file}', [BullitenController::class,'download'])->name('bullitendownload.download');
    Route::get('proceeddownload{file}', [ProceedController::class,'download'])->name('proceeddownload.download');
    // for add edit and delete data
    Route::resource('dashboard/invitation', InvitationController::class);
    Route::resource('dashboard/timeline', TimelineController::class);
    Route::resource('dashboard/award', AwardController::class);
    Route::resource('dashboard/proceed', ProceedController::class);
    Route::resource('dashboard/bulliten', BullitenController::class);
    // for routing
    Route::get('/dashboard/invitation', [InvitationController::class, 'index'])->name('dashboard.invitation');
    Route::get('/dashboard/timeline', [TimelineController::class, 'index'])->name('dashboard.timeline');
    Route::get('/dashboard/award', [AwardController::class, 'index'])->name('dashboard.award');
    Route::get('/dashboard/proceed', [ProceedController::class, 'index'])->name('dashboard.proceed');
    Route::get('/dashboard/bulliten', [BullitenController::class, 'index'])->name('dashboard.bulliten');    
});

// for Planning
Route::group(['middleware' => ['auth', 'role:planning|admin']], function(){
    // for add edit and delete data
    Route::resource('dashboard/elementary', ElementaryController::class);
    Route::resource('dashboard/secondary', SecondaryController::class);
    Route::resource('dashboard/integrated', IntegratedController::class);
    Route::resource('dashboard/private', PrivateController::class);
    // for routing
    Route::get('/dashboard/elementary', [ElementaryController::class, 'index'])->name('dashboard.elementary');
    Route::get('/dashboard/secondary', [SecondaryController::class, 'index'])->name('dashboard.secondary');
    Route::get('/dashboard/integrated', [IntegratedController::class, 'index'])->name('dashboard.integrated');
    Route::get('/dashboard/private', [PrivateController::class, 'index'])->name('dashboard.private');
});

// require __DIR__.'/auth.php';
