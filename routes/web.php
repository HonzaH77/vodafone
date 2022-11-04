<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Models\User;
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
    return view('login');
})->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{project}', function (Project $project) {
    return view('project', ['project' => $project]);
});
Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/{task}', function (Task $task) {
    return view('task', ['task' => $task]);
});
Route::get('users', function () {
    return view('users', ['users' => User::all()]);
});
Route::get('projects/{project}/new-task', function (Project $project) {
    return view('newTask', ['newTask' => $project]);
});
Route::post('projects/{project}/new-task', [TaskController::class, 'store']);
Route::post('/new-project', [ProjectController::class, 'store']);
Route::post('/projects/{project}/comment', [CommentController::class, 'store']);
Route::get('/new-project', function () {
    return view('newProject');
});
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('editTask', ['original' => $task]);
});
Route::post('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::get('/tasks/{task}/delete', [TaskController::class, 'delete']);
Route::get('/projects/{project}/delete', [ProjectController::class, 'delete']);
Route::get('/projects/{project}/edit', function (Project $project) {
    return view('editProject', ['original' => $project]);
});
Route::post('/projects/{project}/edit', [ProjectController::class, 'edit']);
Route::get('/', function () {
    return view('home');
});
Route::get('lang/{locale}', [SessionController::class, 'language']);
Route::get('/projects/notify/{project}', [NotificationController::class, 'store']);
Route::post('/projects/{project}/attachment', [AttachmentController::class, "store"])->middleware('auth');
Route::get('/projects/{project}/attachment/{attachment}', [AttachmentController::class, "download"])->middleware('auth');




