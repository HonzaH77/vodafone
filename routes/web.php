<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationServe;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Task;

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

Route::get('login', function () {
    return view('login.layout.index');
})->name('login')->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('projects', [ProjectController::class, 'all']);
Route::get('projects/{project}', [ProjectController::class, 'index']);
Route::get('tasks', [TaskController::class, 'all']);
Route::get('tasks/{task}', [TaskController::class, 'index']);
Route::get('users', [UserController::class, 'index']);
Route::get('projects/{project}/new-task', function (Project $project) {
    return view('task.layout.create', ['newTask' => $project]);
})->middleware('auth');
Route::post('projects/{project}/new-task', [TaskController::class, 'store'])->middleware('auth');;
Route::post('new-project', [ProjectController::class, 'store'])->name('newProject')->middleware('auth');
Route::post('projects/{project}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::get('new-project', function () {
    return view('project.layout.create');
})->middleware('auth');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::get('tasks/{task}/edit', function (Task $task) {
    return view('task.layout.edit', ['original' => $task]);
})->middleware('auth');;
Route::post('tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');;
Route::get('tasks/{task}/delete', [TaskController::class, 'delete'])->middleware('auth');;
Route::get('projects/{project}/delete', [ProjectController::class, 'delete'])->middleware('auth');;
Route::get('projects/{project}/edit', function (Project $project) {
    return view('project.layout.edit', ['original' => $project]);
})->middleware('auth');;
Route::post('projects/{project}/edit', [ProjectController::class, 'edit'])->middleware('auth');;
Route::get('/', function () {
    return view('home.layout.index');
});
Route::get('lang/{locale}', [SessionController::class, 'language']);
Route::get('projects/notify/{project}', [NotificationServe::class, '__invoke'])->middleware('auth');;
Route::post('projects/{project}/attachment', [AttachmentController::class, "store"])->middleware('auth');
Route::get('projects/{project}/attachment/{attachment}', [AttachmentController::class, "download"])->middleware('auth');
