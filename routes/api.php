<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    auth()->attempt($request->only('email', 'password'));
    return auth()->user();
});

Route::post('/logout', function () {
    auth()->logout();
    return response('');
});
