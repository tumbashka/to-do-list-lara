<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $title = 'Регистрация';
        return view('registration.index', compact('title'));
    }

    public function store(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        \Auth::login($user);

        return redirect()->route('home')->with('success', "Пользователь: {$user->name} успешно зарегистрирован!");
    }
}
