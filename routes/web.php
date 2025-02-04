<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/api/liste', [ArticleController::class, 'listeArticle']);
//CREATE
Route::post('/api/ajout', [ArticleController::class, 'ajoutArticle'])->withoutMiddleware(VerifyCsrfToken::class);
//READ
Route::get('/api/article/{id}', [ArticleController::class, 'voirArticle']);
//UPDATE
Route::post('/api/modif/{id}', [ArticleController::class, 'modifArticle'])->withoutMiddleware(VerifyCsrfToken::class);
//DELETE
Route::post('/api/supp/{id}', [ArticleController::class, 'suppArticle'])->withoutMiddleware(VerifyCsrfToken::class);

