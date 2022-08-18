<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function perform(LoginRequest $request)
    {

        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) :
            return redirect()->to('auth/login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect('admin');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('auth/login');
    }
}