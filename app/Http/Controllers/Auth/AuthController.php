<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth, Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'nickname' => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($request->only('nickname', 'password'), $request->has('remember'))) {
            return redirect()->intended('dialogs');
        }

        return redirect()->back()
            ->withInput($request->only('nickname', 'remember'))
            ->withErrors([
                'email' => 'Никнейм и/или почта неправильные'
            ]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->home();
    }

    public function getSignup()
    {
        return view('auth.signup');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
