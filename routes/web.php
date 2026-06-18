<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload-file');
});

Route::post('/upload',function(){
    if(request()->has('file')){
        return array_map('str_getcsv', file(request()->file('file')));
    }
});