<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GuarantyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGuarantyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CateController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\ShippingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('home.about-us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('home.contact-us');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('home.blogs');
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');

Route::prefix('dashboard')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    // Users Route
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('create_user_role/{id}', [UserController::class, 'CreateUserRole'])->name('user.create.role');
    Route::post('store_user_role/{id}', [UserController::class, 'StoreUserRole'])->name('user.store.role');

    // Products Route
    Route::resource('categories', CategoryController::class);
    Route::get('trashed_category', [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::resource('brands', BrandController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('tags', TagController::class);
    Route::resource('guaranties', GuarantyController::class);
    Route::get('product_guaranty/{id}', [ProductGuarantyController::class, 'index'])->name('product.guaranties.index');
    Route::get('product_guaranty_create/{id}', [ProductGuarantyController::class, 'create'])->name('product.guaranties.create');
    Route::post('product_guaranty_store/{id}', [ProductGuarantyController::class, 'store'])->name('product.guaranties.store');
    Route::get('product_guaranty_edit/{id}/{product_id}', [ProductGuarantyController::class, 'edit'])->name('product.guaranties.edit');
    Route::put('product_guaranty_update/{id}/{product_id}', [ProductGuarantyController::class, 'update'])->name('product.guaranties.update');
    Route::resource('products', ProductController::class);
    Route::get('trashed_products', [ProductController::class, 'trashed'])->name('products.trashed');
    Route::get('product_properties_create/{product}', [ProductController::class, 'CreateProductProperties'])->name('product.properties.create');

    Route::get('product_imagegallery_create/{id}', [ProductController::class, 'CreateImageGallery'])->name('product.imagegallery.create');
    Route::post('product_imagegallery_store/{id}', [ProductController::class, 'StoreImageGallery'])->name('product.imagegallery.store');

    Route::resource('property_groups', PropertyGroupController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('orders', OrderController::class);


    Route::get(
        '/orders/{order}/invoice',
        [OrderController::class, 'invoice']
    )
        ->name('orders.invoice');

    Route::get(
        '/reports/daily',
        [ReportController::class, 'daily']
    )
        ->name('reports.daily');
    // Orders
    // Route::get('/orders/index', [OrderController::class, 'index']);
    // Route::get('/orders/create', [OrderController::class, 'create']);
    // Route::post('/orders/store', [OrderController::class, 'store'])
    //     ->name('orders.store');



    // comments
    Route::get('users_comments', [CommentController::class, 'userComments'])->name('user.comments');
});

Route::get('/products/{product:slug}', [HomeController::class, 'singleProduct'])->name('single.product');
Route::get('/cart', [CartController::class, 'cart'])->middleware(['auth'])->name('cart');
Route::get('/shipping', [ShippingController::class, 'shipping'])->middleware(['auth'])->name('shipping');
Route::get('/payment', [PaymentController::class, 'payment'])->middleware(['auth'])->name('payment');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('callback');
// Route::get('/payment/success', [PaymentController::class, 'success'])->name('success');

// Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [CateController::class, 'show'])
    ->name('category.show');

Route::middleware(['auth'])->prefix('profile')->group(function () {

    Route::get('/', [ProfileController::class, 'index'])->name('profile');

    Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');

    Route::get('/addresses', [ProfileController::class, 'addresses'])->name('profile.addresses');

    Route::get('/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/orders/{order}', [ProfileController::class, 'showOrder'])
        ->name('profile.order.show');
});



require __DIR__ . '/auth.php';
