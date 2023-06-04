<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
//admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch']);
Route::get('/tap-phim', [IndexController::class, 'episode'])->name('tap-phim');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class, 'search'])->name('tim-kiem');
Route::get('/locphim', [IndexController::class, 'filter'])->name('locphim');

Route::get('/update-year-phim', [MovieController::class, 'update_year']);
Route::get('/update-season-phim', [MovieController::class, 'update_season']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);

//route admin
Route::resource('category', CategoryController::class);
Route::post('resortingCategory', [CategoryController::class, 'resorting'])->name('resortingCategory');
Route::post('resortingCountry', [CountryController::class, 'resorting'])->name('resortingCountry');
Route::post('resortingGenre', [GenreController::class, 'resorting'])->name('resortingGenre');

Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);

//Thêm tập phim
Route::get('add-episode/{id}', [EpisodeController::class, 'add_episode'])->name('add-episode');
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');

//Thay đổi danh mục bằng ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
//Thay đổi quốc gia bằng ajax
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
//Thay đổi phim hot bằng ajax
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
//Thay đổi phụ đề bằng ajax
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
//Thay đổi thuộc phim bằng ajax
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
//Thay đổi status bằng ajax
Route::get('/status-choose', [MovieController::class, 'status_choose'])->name('status-choose');
//Thay đổi định dạng bằng ajax
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
//Thay đổi hình ảnh bằng ajax
Route::post('/update-image-ajax', [MovieController::class, 'update_image_ajax'])->name('update-image-ajax');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
