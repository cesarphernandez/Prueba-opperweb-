<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\PostsController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**Categorias  */

Route::get('/categoria', [CategoriaController::class, 'getCategorias']);
Route::get('/categoria/{id}', [CategoriaController::class, 'getCategoria']);
Route::post('/categoria', [CategoriaController::class, 'postCategoria']);
Route::put('/categoria/{id}', [CategoriaController::class, 'updateCategoria']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'deleteCategoria']);

/**Posts  */

Route::get('/post', [PostsController::class, 'getPosts']);
Route::get('/post/{id}', [PostsController::class, 'getPost']);
Route::post('/post', [PostsController::class, 'postPost']);
Route::put('/post/{id}', [PostsController::class, 'updatePost']);
Route::delete('/post/{id}', [PostsController::class, 'deletePost']);

/**Comentarios  */

Route::get('/comentario', [ComentariosController::class, 'getComentarios']);
Route::get('/comentario/{id}', [ComentariosController::class, 'getComentario']);
Route::post('/comentario', [ComentariosController::class, 'postComentario']);
Route::put('/comentario/{id}', [ComentariosController::class, 'updateComentario']);
Route::delete('/comentario/{id}', [ComentariosController::class, 'deleteComentario']);
