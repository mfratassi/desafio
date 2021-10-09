<?php

use App\Http\Controllers\CampanhaController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\DescontoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\GruposCidadeController;
use App\Http\Controllers\ProdutoController;
use App\Models\Campanha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('grupos/{grupo}/add_campanha/{campanha}', [GruposCidadeController::class, 'add_campanha']);
Route::apiResource('grupos', GruposCidadeController::class);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('estados', EstadoController::class);
Route::post('campanhas/{campanha}/add_produto/{produto}', [CampanhaController::class, 'add_produto']);
Route::apiResource('campanhas', CampanhaController::class);
Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('descontos', DescontoController::class);

