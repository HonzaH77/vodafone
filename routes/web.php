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
use function App\Helpers\projectRepository;

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

Route::get('login', function () {return view('login.layout.index');})->name('login')->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('registration')->middleware('guest');
Route::get('projects', [ProjectController::class, 'all'])->name('allProjects');
Route::get('projects/{project}', [ProjectController::class, 'index'])->name('project');
Route::get('tasks', [TaskController::class, 'all'])->name('allTasks');
Route::get('tasks/{task}', [TaskController::class, 'index'])->name('task');
Route::get('users', [UserController::class, 'index'])->name('allUsers');
Route::get('projects/{project}/new-task', function (Project $project) {
    return view('task.layout.create', ['newTask' => $project]);
})->name('newTask')->middleware('auth');
Route::post('projects/{project}/new-task', [TaskController::class, 'store'])->middleware('auth');;
Route::post('new-project', [ProjectController::class, 'store'])->name('addNewProject')->middleware('auth');
Route::post('projects/{project}/comment', [CommentController::class, 'store'])->name('addComment')->middleware('auth');
Route::get('new-project', function () {
    return view('project.layout.create');
})->name('newProject')->middleware('auth');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
Route::post('login', [SessionController::class, 'store'])->name('loginSubmit')->middleware('guest');
Route::get('tasks/{task}/edit', function (Task $task) {
    return view('task.layout.edit', ['original' => $task]);
})->name('editTask')->middleware('auth');;
Route::post('tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');;
Route::get('tasks/{task}/delete', [TaskController::class, 'delete'])->name('deleteTask')->middleware('auth');;
Route::get('projects/{project}/delete', [ProjectController::class, 'delete'])->name('deleteProject')->middleware('auth');;
Route::get('projects/{project}/edit', function (Project $project) {
    return view('project.layout.edit', ['original' => $project]);
})->name('editProject')->middleware('auth');;
Route::post('projects/{project}/edit', [ProjectController::class, 'edit'])->middleware('auth');;
Route::get('/', function () {
    return view('home.layout.index');
});
Route::get('lang/{locale}', [SessionController::class, 'language'])->name('language');
Route::get('projects/notify/{project}', [NotificationServe::class, '__invoke'])->name('notification')->middleware('auth');;
Route::post('projects/{project}/attachment', [AttachmentController::class, "store"])->name('addAttachment')->middleware('auth');
Route::get('projects/{project}/attachment/{attachment}', [AttachmentController::class, "download"])->name('attachment')->middleware('auth');
Route::bind('projectId', function($id) {
    return projectRepository()->getProjectById($id);
});
