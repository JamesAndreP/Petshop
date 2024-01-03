<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Models\Notification;
use App\Models\PetProduct;
use App\Models\User;
use App\View\Components\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::middleware(['user'])->group(function () {
    Route::get('/', function () {
        return view('/home');
    });
    // Route::get('/test', function () {
    //     echo Session::get('type');
    // });
    Route::view('/login', 'login');
    Route::view('/register', 'register');
    // Route::view('/home', 'home');
    Route::view('/register', 'register');
    Route::view('/index', 'index');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/add-pet', [PetController::class, 'addPet']);
    Route::post('/add-post-from-mypost', [PetController::class, 'addPet']);
    Route::post('/submit-comment', [PostController::class, 'submitComment']);
    Route::post('/submit-comment-from-mypost', [PostController::class, 'submitComment']);
    Route::post('/view-post-submit-comment', [PostController::class, 'submitComment']);
    Route::post('/view-posts-submit-comment', [PostController::class, 'submitComment']);
    Route::patch('/get-notifications', [NotificationController::class, 'getNotification']);
    Route::get('/view-post', [PostController::class, 'viewPost']);
    Route::view('/view-products', 'viewproducts');
    Route::get('/view-product', [ProductController::class, 'viewProduct']);
    Route::view('/view-posts', 'viewposts');
    Route::view('/my-posts', 'myposts');
    Route::get('send-mail', [MailController::class, 'sendVerification']);
    Route::view('/services/{slug}', 'viewservice');
    Route::middleware(['verification_code'])->group(function () {
        Route::view('/verification', 'verification');
        Route::post('/verify-email', [LoginController::class, 'verifyEmail']);
    });
});

# admin panel routes
Route::middleware(['admin'])->group(function () {
    // Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/logout', function () {
            session()->pull('username');
            session()->pull('type');
            return redirect('/');
        });
        #dashboard
        Route::view('/dashboard', 'admin.dashboard');

        #Add Admin
        Route::view('/add-new-admin', 'admin.addadmin');
        Route::post('/add-admin', [AdminController::class, 'addAdmin']);

        #pet category
        Route::view('/pet-category', 'admin.petcategory');
        Route::post('/submit-pet-category', [PetController::class, 'addPetCategory']);
        Route::post('/update-pet-category', [PetController::class, 'updatePetCategory']);
        Route::post('/delete-pet-category', [PetController::class, 'deletePetCategory']);

        #pet
        Route::view('/pet-management', 'admin.petmanagement');
        Route::post('/add-pet', [PetController::class, 'addPet']);
        Route::post('/update-pet', [PetController::class, 'updatePet']);
        Route::post('/delete-pet', [PetController::class, 'deletePet']);

        #pet type
        Route::view('/pet-type', 'admin.pettype');
        Route::post('/submit-pet-type', [PetController::class, 'addPetType']);
        Route::post('/update-pet-type', [PetController::class, 'updatePetType']);
        Route::post('/delete-pet-type', [PetController::class, 'deletePetType']);

        #pet approval
        Route::view('/pet-approval', 'admin.petapproval');
        Route::post('/approve-pet', [PetController::class, 'approvePet']);

        #available pet for sale
        Route::view('/available-pet-selling', 'admin.availablepetselling');

        #available pet for adoption
        Route::view('/available-pet-adoption', 'admin.availablepetadoption');

        #sold pets
        Route::view('/sold-pets', 'admin.soldpets');

        #adopted pets
        Route::view('/adopted-pets', 'admin.adoptedpets');

        #update pet status for adoption/selling (available/unavailable)
        Route::post('/update-pet-unavailable', [PetController::class, 'updatePetUnavailable']);
        Route::post('/update-pet-available', [PetController::class, 'updatePetAvailable']);

        #Services
        Route::view('/services', 'admin.services');
        Route::post('/add-service', [ServiceController::class, 'addService']);
        Route::post('/update-service', [ServiceController::class, 'updateService']);
        Route::post('/delete-service', [ServiceController::class, 'deleteService']);

        #Products
        Route::view('/products', 'admin.products');
        Route::post('/add-product', [ProductController::class, 'addProduct']);
        Route::post('/update-product', [ProductController::class, 'updateProduct']);
        Route::post('/delete-product', [ProductController::class, 'deleteProduct']);

        #get notification
        Route::patch('/get-notifications', [NotificationController::class, 'getNotification']);

        #View Posts
        Route::view('/view-posts', 'admin.posts');
        Route::get('/view-post', [PostController::class, 'viewAdminPost']);



        #testtt
        Route::view('/test', 'admin.test');
        Route::post('/test', [PetController::class, 'test']);
    });
});
