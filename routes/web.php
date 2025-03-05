<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellterMainController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/user', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/store', 'manage_store')->name('admin.manage.store');
            Route::get('/carts/history', 'cart_history')->name('admin.cart.history');
            Route::get('/orders/history', 'order_history')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
           
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
           
        });
        
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage');
    
           
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage');
           
        });
        Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });

          Route::controller(MasterCategoryController::class)->group(function () {
            Route::post('/store/create', 'store_category')->name('store.create');
            Route::get('/store/edit/{id}', 'edit_category')->name('store.edit');
            Route::put('/store/update/{id}', 'update_category')->name('store.update');
            Route::delete('/store/delete/{id}', 'delete_category')->name('store.delete');
    
        });

    });
       
});
   


Route::middleware(['auth', 'verified', 'role:vender'])->group(function () {
    Route::prefix('seller')->group(function () {
        Route::controller(SellterMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/orderhistory', 'order_history')->name('vendor.order.history');
          
        });

        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('vendor.store.create');
            Route::get('/store/manage', 'store_management')->name('vendor.store.manage');
          
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'product_create')->name('vendor.product.create');
            Route::get('/product/manage', 'product_management')->name('vendor.product.manage');
          
        });

    });
       
});


Route::middleware(['auth', 'verified', 'role:customer'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'profile')->name('customer');
            Route::get('/history', 'history')->name('customer.history');
            Route::get('/payment', 'payment')->name('customer.payment');
            Route::get('/affilated', 'affilated')->name('customer.affilated');
           
          
        });

        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('vendor.store.create');
            Route::get('/store/manage', 'store_management')->name('vendor.store.manage');
          
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'product_create')->name('vendor.product.create');
            Route::get('/product/manage', 'product_management')->name('vendor.product.manage');
          
        });

    });
       
});
   

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';