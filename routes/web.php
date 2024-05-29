<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

/*
 The view accept 3 agurments 
 1. is the view name from the resources folder
 2. data:: This is usually from the database but you can also pass it manually
 */

/*
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' =>
        
        [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 4,
                'title' => 'Listing Four',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
        ]
    ]);
});
*/

// All Listings

Route::group(['as' => 'listings.', 'perfix' => 'listings'], function () {
    Route::get('/', [ListingController::class, 'index'])->name('index');
    // show create from
    Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('create-form');
    // store listing data
    Route::post('/listings', [ListingController::class, 'store'])->middleware('auth')->name('store');
    // Show Edit Form 
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth')->name('edit');
    // update listings
    Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth')->name('update');
    //Delete Listing 
    Route::put('listings/{listing}', [ListingController::class, 'delete'])->name('delete');
    // Single listing
    Route::get('listings/{listing}', [ListingController::class, 'show'])->name('show');
});

Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
    // Show register/create form 
    Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('create-user');
    // Create new user
    Route::post('/users', [UserController::class, 'store'])->name('submit');
    // Log the user out
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    // Show login form
    Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
    // Login User
    Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
});
