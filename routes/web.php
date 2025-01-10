<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homePage'])->name('homePage');
Route::get('/friend', [PageController::class, 'friendPage'])->name('friendPage');
Route::get('/detail/{user_id}/', [PageController::class, 'detailPage'])->name('detailPage');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [PageController::class, 'loginPage'])->name('loginPage');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

    Route::get('/register', [PageController::class, 'registerPage'])->name('registerPage');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');

    Route::post('/payment', [AuthenticationController::class, 'payment'])->name('payment');
    Route::post('/overpaid-payment', [AuthenticationController::class, 'overpaidPayment'])->name('overpaidPayment');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/add-friend/{receiver_id}', [FriendController::class, 'addFriend'])->name('addFriend');

    Route::get('/top-up', [PageController::class, 'topupPage'])->name('topupPage');
    Route::post('/top-up', [CoinController::class, 'topup'])->name('topup');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/my-profile', [PageController::class, 'myProfilePage'])->name('myProfilePage');

    Route::post('/change-visibility', [UserController::class, 'changeVisibility'])->name('changeVisibility');

    Route::get('/market', [PageController::class, 'marketPage'])->name('marketPage');
    Route::post('/purchase-avatar/{avatar_id}', [AvatarController::class, 'purchaseAvatar'])->name('purchaseAvatar');
    Route::post('/change-avatar', [UserController::class, 'changeAvatar'])->name('changeAvatar');

    Route::get('/friend-request', [PageController::class, 'friendRequestPage'])->name('friendRequestPage');
    Route::post('/accept-friend/{sender_id}', [FriendController::class, 'acceptFriend'])->name('acceptFriend');
    Route::post('/reject-friend/{sender_id}', [FriendController::class, 'rejectFriend'])->name('rejectFriend');

    Route::get('/chat/{current_chat_id?}', [PageController::class, 'chatPage'])->name('chatPage');
    Route::post('/send-message/{receiver_id}', [ChatController::class, 'sendMessage'])->name('sendMessage');

    Route::get('/notification', [PageController::class, 'notificationPage'])->name('notificationPage');
});

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-locale');
