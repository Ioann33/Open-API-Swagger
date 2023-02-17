<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 6;
        $users = User::query()->orderBy('created_at', 'desc')->limit($perPage)->get();
        return view('home', ['users' => $users]);
    }

    public function create()
    {
        return view('create');
    }

    public function save()
    {

    }
}
