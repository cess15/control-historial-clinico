<?php

use App\Services\FirebaseService;
use App\User;
use Illuminate\Http\Request;
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

Route::post('/perfil/avatar/{id}', function (Request $request, $id) {
    $storage = new FirebaseService;
    $file = $request->file('imagen_perfil');
    $nameFile = $file->getClientOriginalName();
    $token = Str::random(30);
    $replaceName = Str::replaceArray($nameFile, [$token], $nameFile);
    $file->move(public_path() . "/foto"."/", $nameFile);
    $data = ['name' => $replaceName . '.' . $file->getClientOriginalExtension(), 'url' => 'https://storage.googleapis.com/' . config('services.firebase.bucket') . "/clinica"."/" . $replaceName . '.' . $file->getClientOriginalExtension()];
    $upload = $storage->firebase->upload(fopen(public_path() . "/foto"."/" . $file->getClientOriginalName(), 'r'), ['predefinedAcl' => 'publicRead', 'name' => 'clinica/' . $replaceName . '.' . $file->getClientOriginalExtension()]);

    if($upload){
        unlink(public_path()."/foto"."/".$file->getClientOriginalName());
    }


    $user = User::findOrFail($id);

    if ($request->hasFile('imagen_perfil')) {
        $user->imagen_perfil = $data['name'];
        $user->url_imagen_perfil = $data['url'];
        $user->update();
    }

    return response()->json($data, 200);
});
