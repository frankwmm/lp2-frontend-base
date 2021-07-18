<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CursoController;
use App\Http\Controllers\API\AsignaturaController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AlumnoController;
use App\Http\Controllers\API\PeriodoController;
use App\Http\Controllers\API\MatriculaController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

     

Route::get('listAlumnos', [AlumnoController::class, 'ReporteAlumnos']);
Route::get('listAlumnosUser', [AlumnoController::class, 'ReporteAlumnosUser']);
Route::get('listaAlumnos', [AlumnoController::class, 'index']);
Route::get('listaPeriodos', [PeriodoController::class, 'index']);
Route::post('saveMatricula', [MatriculaController::class, 'store']);
Route::get('shoAlumno/{id}', [AlumnoController::class, 'show']);


Route::middleware('auth:api')->group( function () {

    Route::resource('products', ProductController::class);
    Route::resource('cursos', CursoController::class);   
    Route::resource('asignaturas', AsignaturaController::class);    

    Route::put('actualizaEstado/{id}', [RegisterController::class, 'actualizarEstado']);
    Route::get('listausuarios', [RegisterController::class, 'listUser']);
        
    
    
});