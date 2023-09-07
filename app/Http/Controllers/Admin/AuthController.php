<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){

        return view('admin.auth.login');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'email' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100'],
        ]);


        $email = $validated['email'];
        $password = $validated['password'];
        $remember = $request->boolean('remember');

        if(auth("admin")->attempt($validated))
            return redirect()->route("admin.books.index");


        return redirect()->route('admin.login')->withErrors(["email" => "Пользователь не найден"])->withInput();
    }
}
