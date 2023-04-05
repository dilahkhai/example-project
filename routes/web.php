<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

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

# API
Route::get('/', [HomeController::class, 'index']);
Route::get('/task', [TaskController::class, 'index']);
Route::get('task/{id}', [TaskController::class, 'show']);
// menggunakan method post untuk menambahkan data
Route::post('/task', [TaskController::class, 'store']);
// menggunakan method patch untuk update data
Route::patch('/task/{id}', [TaskController::class, 'update']);
// menggunakan method delete untuk menghapus data
Route::delete('/task/{id}', [TaskController::class, 'destroy']);


# web
Route::get('/task/data/create', [TaskController::class, 'create']); // create
Route::get('/task/{id}/edit', [TaskController::class, 'edit']); // edit


// # menampilkan halaman melalui route
// Route::get('/about', function(){
//     return view('about');
// });

// # menampilkan data secara langsung melalui route
// Route::get('/hello', function(){
//     $dataArray = [
//         'message' => 'Hello, World'
//     ];

//     return $dataArray;
//     // return response()->json($dataArray);
       
// });


// # fungsi debugging untuk menampilkan response
// Route::get('/debug', function(){
//     $dataArray = [
//         'message' => 'Hello, World'
//     ];
//     ddd(request());
//     //dd = dumpdie
//     //ddd = dumpdiedebug
// });



//     // menggunakan method get
//     Route::get('/tasks', function() use($taskList){
//         return $taskList;
//     });


// # menggunakan method put
// Route::put('/tasks/{key}', function($key) use($taskList) {
//     $taskList[$key] = request()->task;
//     return $taskList;
// });

