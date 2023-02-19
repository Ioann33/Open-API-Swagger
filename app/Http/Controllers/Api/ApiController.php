<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tinify\Source;
use Tinify\Tinify;

class ApiController extends Controller
{
    public function getUsers(Request $request): JsonResponse
    {
        $perPage = $request->perPage ?? 6;
        $users = User::query()->orderBy('created_at', 'desc')->limit($perPage)->get();

        return response()->json($users);
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'photo' => 'required|mimes:jpeg,jpg,bmp,png',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $path = 'storage/'.$request->file('photo')->store('origin', 'public');
        Tinify::setKey('9vknXbc3fVnGFy1sTYJ6qr3R7gV7rdYV');
        $path_info = pathinfo($path);
        $res_pass = "storage/photos/{$path_info['filename']}.jpg";
        $source = Source::fromFile($path)->convert(["type"=>"image/jpg"]);
        $source->resize([
            "method" => "fit",
            "width" => 70,
            "height" => 70
        ])->toFile($res_pass);
        unlink($path);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $res_pass,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([], 204);
    }
}
