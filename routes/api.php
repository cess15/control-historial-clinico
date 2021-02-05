<?php

use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload', function (Request $request) {
    $storage = new FirebaseService;
    $file = $request->file('file');
    $nameFile=$file->getClientOriginalName();
    $token=Str::random(30);
    $replaceName=Str::replaceArray($nameFile, [$token], $nameFile);
    $file->move(public_path() . '/subidas/', $file->getClientOriginalName());
    $data = ['name' => 'https://storage.googleapis.com/' . config('services.firebase.bucket') . '/clinica/' . $replaceName.'.'.$file->getClientOriginalExtension()];
    $storage->firebase->upload(fopen(public_path() . '/subidas/' . $file->getClientOriginalName(), 'r'), ['predefinedAcl' => 'publicRead', 'name' => 'clinica/' . $replaceName.'.'.$file->getClientOriginalExtension()]);
    return $data;
});
