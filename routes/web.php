<?php

use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductClientController;
use App\Http\Controllers\client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ViewOrderDetailController;
use App\Http\Controllers\Client\ViewOrdersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Trang chủ những trang ko cần đăng nhập
Route::group([], function () {
    // Trang chủ
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Chi tiết sản phẩm
    Route::get('/product/{id}', [ProductClientController::class, 'show'])->name('product.show');

    // Giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    //Tìm kiếm và lọc
    Route::get('/products/search', [ClientProductController::class, 'search'])->name('products.search');
});


// Dashboard chỉ cho người dùng đã đăng nhập
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Nhóm route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    //Trang đặt hàng
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    //Trang danh sách đơn hàng
    // Route::get('/orders', [ViewOrdersController::class, 'index'])
    //     ->name('view-orders');
    //trang chi tiết đơn hàng
    Route::get('/order/{id}', [ViewOrderDetailController::class, 'show'])->name('view-order-detail');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route cho admin (yêu cầu cả auth và admin)
Route::middleware(['auth', 'admin_check'])->group(function () {
    Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/user/{user}/toggle-lock', [UserController::class, 'toggleLock'])->name('users.toggle-lock');
        Route::post('/user/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
        Route::post('/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.remove-admin');

        // Categories
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('list-categories', [CategoryController::class, 'index'])->name('index');
            Route::get('add-category', [CategoryController::class, 'create'])->name('create');
            Route::post('add-category', [CategoryController::class, 'store'])->name('store');
            Route::get('delete-category/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('edit-category/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete');
        });

        // Colors
        Route::group(['prefix' => 'colors', 'as' => 'colors.'], function () {
            Route::get('list-colors', [ColorController::class, 'index'])->name('index');
            Route::get('add-color', [ColorController::class, 'create'])->name('create');
            Route::post('add-color', [ColorController::class, 'store'])->name('store');
            Route::get('delete-color/{id}', [ColorController::class, 'edit'])->name('edit');
            Route::put('edit-color/{id}', [ColorController::class, 'update'])->name('update');
            Route::delete('delete-color/{id}', [ColorController::class, 'destroy'])->name('destroy');
        });

        // Products
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('list-products', [ProductController::class, 'index'])->name('index');
            Route::get('add-product', [ProductController::class, 'create'])->name('create');
            Route::post('add-product', [ProductController::class, 'store'])->name('store');
            Route::get('delete-product/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('edit-product/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('delete-product/{id}', [ProductController::class, 'destroy'])->name('destroy');
            // Route cho trang sản phẩm đã xóa
            Route::get('trashed-products', [ProductController::class, 'trashed'])->name('trashed');

            // Route để khôi phục sản phẩm đã xóa
            Route::patch('restore-product/{id}', [ProductController::class, 'restore'])->name('restore');

            // Route để xóa vĩnh viễn sản phẩm đã xóa (tùy chọn)
            Route::delete('force-delete-product/{id}', [ProductController::class, 'forceDelete'])->name('force-delete');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('list-orders', [OrderController::class, 'index'])->name('index');
            Route::get('edit-order/{order}', [OrderController::class, 'edit'])->name('edit');
            Route::put('edit-order/{order}', [OrderController::class, 'update'])->name('update');
            // Bạn có thể thêm các route khác nếu cần, ví dụ như xem chi tiết đơn hàng (show)
            Route::get('view-order/{order}', [OrderController::class, 'show'])->name('show');
        });
    });
});

require __DIR__ . '/auth.php';
