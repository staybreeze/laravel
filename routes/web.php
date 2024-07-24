<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\LoginController;

// 主頁面

Route::get('/', [GoodsController::class, 'index'])->name('home.index');
Route::get('/index', [GoodsController::class, 'index']);

Route::get('/goods', [GoodsController::class, 'index'])->name('goods.index');
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/register', [UsersController::class, 'index'])->name('register.index');
Route::post('/api/acc_check', [UsersController::class, 'checkAccount']);

// 關於我們
Route::get('/about_us', [AboutUsController::class, 'index']);
Route::post('/back/about_us', [AboutUsController::class, 'update'])->name('about_us.update');
Route::get('/back/about_us',[ AboutUsController::class,'backIndex']);
// 文章頁面
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/{formatted_time}', [ArticlesController::class,'show']);
// 購物車
// Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
Route::get('/cart', function () {
    if (!Session::has('user')) {
        Session::put('cart', true);
        return redirect('/login')->with('login_error', '請先登入會員');
    }
    return app(\App\Http\Controllers\CartsController::class)->index();
})->name('cart.index');




// 搜索頁面
Route::get('/search', function () {
    return view('search');
})->name('search.index');

// 領養頁面
Route::get('/adoption', function () {
    return view('adoption');
});

Route::get('/back', [BackController::class, 'index'])->name('back');
Route::get('/back_login', [BackController::class, 'loginPage'])->name('back.login');


Route::get('/back/total',[ TotalController::class,'backIndex']);
Route::post('/back/total', [TotalController::class, 'update'])->name('back.edit.total');

Route::get('/back/users',[ UsersController::class,'backIndex']);
Route::post('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user/update', [UsersController::class, 'userUpdate'])->name('user.update');
Route::post('/users/update', [UsersController::class, 'usersUpdate'])->name('users.update');
Route::get('/user/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');

Route::get('/back/admins',[ AdminsController::class,'backIndex']);
Route::post('/admin/create', [AdminsController::class, 'create'])->name('admin.create');
Route::post('/admin/update', [AdminsController::class, 'update'])->name('admin.update');

Route::get('back/articles/edit', [ArticlesController::class, 'backEditIndex'])->name('articles.editIndex');
Route::get('back/articles/create', [ArticlesController::class, 'backCreateIndex'])->name('articles.createIndex');
Route::post('/api/articles', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('/articles/edit/{id}/{page}', [ArticlesController::class, 'editing'])->name('article.edit');
Route::post('/articles/update/{id}/{page}', [ArticlesController::class, 'update'])->name('article.update');
Route::get('/articles/delete/{id}', [ArticlesController::class, 'delete'])->name('article.delete');

Route::get('/back/goods',[ GoodsController::class,'backIndex']);
Route::post('/goods/create', [GoodsController::class, 'create'])->name('goods.create');
Route::post('/goods/update/{id}', [GoodsController::class, 'update'])->name('goods.update');
Route::get('/goods/delete/{id}', [GoodsController::class, 'delete'])->name('goods.delete');

Route::get('/back/orders',[ OrdersController::class,'backIndex']);

Route::get('/back/messages',[ MessagesController::class,'backIndex']);

// 會員頁面
// Route::get('/member', function () {
//     return view('member');
// });

Route::post('/logging',  [LoginController::class, 'login'])->name('logging');
Route::post('/back_logging',  [LoginController::class, 'backLogin'])->name('back.logging');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login',  [LoginController::class, 'index'])->name('login');

Route::get('/cart/session_to_cart', [CartsController::class, 'sessionToCart'])->name('session.to.cart');
Route::post('/message/create', [MessagesController::class, 'create'])->name('message.create');
Route::get('/add_good/{id}', [CartsController::class, 'addToCart'])->name('add.good');
Route::post('/api/add_like', [GoodsController::class,'addLike'])->name('add.like');

Route::get('/cart/delete/{id}', [CartsController::class, 'delete'])->name('cart.delete');