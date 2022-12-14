<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('my')->middleware('auth')->group(function () {

});

Route::resources([
    'courses' => \App\Http\Controllers\CourseController::class,
]);


Route::get('/order/view', function () {
    $order = \App\Models\BuyedCourse::query()->find($_GET['order_id']);
    return view('orders.view', ['orderData' => $_GET, 'order' => $order]);
})->name('confirmed-order');

Route::get('/order/show/{order}', function (\App\Models\BuyedCourse $order) {
    return view('orders.show', compact('order'));
})->name('order.show');

/**
 * Get course
 */
Route::get('/courses/get/{id}', function ($id) {
    $getInfoController = new \App\Http\Controllers\Api\GetInfoController();
    return view('courses.get', [
        'course' => \App\Models\Course::find($id),
    ]);
})->name('get-course');

Route::get('teach/course/{course}', 'App\Http\Controllers\CourseController@teach')->name('courses.teach');
