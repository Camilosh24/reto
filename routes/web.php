<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    return view('posts');
});


Route::get('/categoria', function () {
    return view('categorias');
});


Route::get('/blog', function () {
    return view('blog');
});

