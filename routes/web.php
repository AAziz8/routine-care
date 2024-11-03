<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\logoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserOrderController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TruncateController;
use Illuminate\Support\Facades\Artisan;






Route::get('/seed', function () {
    // Call the db:seed command directly
    Artisan::call('db:seed');
    
    // Return a response indicating the seeding is complete
    return 'Database seeded successfully!';
});

Route::get('/truncate-tables', [TruncateController::class, 'truncateTables'])->name('tables.truncate');





Route::get('/{page}', function () {
    $cartItems = Cart::where('user_id', auth()->id())->get();
    $cartTotal = $cartItems->sum('price');
    $cartCount = count($cartItems);

    // Pass the cart-related information to the view
    return view('home', compact('cartItems', 'cartTotal', 'cartCount'));

})->where('page', '^$|home');

Route::get('/about', function () {
    return view('about');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});
// Remove the default login route
Auth::routes(['except' => 'login']);
Auth::routes(['verify' => true]);

Route::get('/adminlogin786', [LoginController::class, 'showLoginForm'])->name('adminlogin786');
Route::post('/adminlogin786', [LoginController::class, 'login'])->name('admin.login.submit');


Route::group(['middleware' => ['auth.admin']], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('transaction', [\App\Http\Controllers\OrderController::class, 'index']);

    Route::get('getcontact', [CategoryController::class, 'getcontact'])->name('contacts.getcontact');

    Route::get('/contract', [CategoryController::class, 'showSubmissions'])->name('contract.index');


//   for datatable
    Route::get('getuser', [UserController::class, 'getuser'])->name('users.getuser');
    Route::get('getrole', [RoleController::class, 'getrole'])->name('roles.getrole');
    Route::get('getcategory', [CategoryController::class, 'getcategory'])->name('categories.getcategory');
    Route::get('getproduct', [ProductController::class, 'getproduct'])->name('products.getproduct');
    Route::get('getcontact', [CategoryController::class, 'getcontact'])->name('contacts.getcontact');


    //for delete
    Route::post('/deleteuser', [UserController::class, 'deleteuser'])->name('delete.user');
    Route::post('/deleterole', [RoleController::class, 'deleterole'])->name('delete.role');
    Route::post('/deletecategory', [CategoryController::class, 'deletecategory'])->name('delete.category');
    Route::post('/deleteproduct', [ProductController::class, 'deleteproduct'])->name('delete.product');
    Route::post('/deletecontact', [CategoryController::class, 'deletecontact'])->name('delete.contact');


//    for dynamic dropdown

    Route::post('parent', [CategoryController::class, 'parent'])->name('categories.parent');

//for upload
    Route::post('editor/image_upload', [ProductController::class, 'upload'])->name('upload');


//    for social

    Route::get('updates/{update}/edit', [UpdateController::class, 'edit']);
    Route::post('updates/{id}', [UpdateController::class, 'update'])->name('updates.update');


//    for logo
    Route::get('logos/{logo}/edit', [logoController::class, 'edit']);
    Route::post('logos/{id}', [logoController::class, 'update'])->name('logos.update');

//for chart

    Route::get('/products-chart', [ProductController::class, 'countProducts'])->name('posts.chart');

    Route::get('/get-products-data', [ProductController::class, 'getPostsData'])->name('get.posts.data');

    Route::get('admin/view-order/{id}', [\App\Http\Controllers\OrderController::class, 'viewTransaction']);

    Route::get('order-history', [\App\Http\Controllers\OrderController::class, 'orderhistory']);

    Route::put('update-order/{id}', [\App\Http\Controllers\OrderController::class, 'updateorder']);


});


//for listing


//for search

Route::get('/search', [ProductController::class, 'search'])->name('search');
//for cart

//Route::get('/cart', [ProductController::class , 'cart'])->name('cart');


Route::get('/products/filter', [ProductController::class, 'filterByPrice']);


Route::post('/submit-form', [ProductController::class, 'cart_form'])->name('submit-form');

//contact form
//Route::get('/contact', [CategoryController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [CategoryController::class, 'sendMessage'])->name('contact.send');



 Route::group(['middleware' => ['auth.check']], function () {
     Route::get('cart', [CartController::class, 'cart'])->name('cart');
     Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
     Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
     Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');

    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/place-order', [CartController::class, 'pay_order'])->name('place-order');
    Route::get('orders', [UserOrderController::class, 'index'])->name('order-user');
    Route::get('order/{id}', [UserOrderController::class, 'view'])->name('users-orders');

 });


//for detail


Route::get('stripe-blade', [\App\Http\Controllers\StripeController::class, 'stripe']);

Route::post('stripe', [\App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('s2', [\App\Http\Controllers\StripeController::class, 'new']);


Route::get('/{slug}', [ProductController::class, 'detail'])->name('detail');
Route::get('/{slug}/{id}', [ProductController::class, 'list_product'])->name('list');
