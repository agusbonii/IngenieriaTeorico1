<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function Register(Request $request)
    {
        $username = $request->post('username');
        $complete_name = $request->post("complete_name");
        $password = Hash::make($request->post("password"));

        if (User::where('username', $username)->first() === NULL) {
            $User = new User();
            $User->username = $username;
            $User->complete_name = $complete_name;
            $User->password = $password;

            if ($User->save())
                return redirect()->back()->withSuccess(trans('user.register.success'));

            return redirect()->back()->withErrors(trans('user.register.inesperate'));
        }
        return redirect()->back()->withErrors(trans('user.register.exists'));
    }

    public function Modify(Request $request)
    {
        $UserAuth = Auth::user();
        $User = User::where('username', $UserAuth->username)->first();

        if ($User !== NULL) {
            $username = $request->post('username');
            $complete_name = $request->post("complete_name");
            $password = Hash::make($request->post("password"));

            $User->username = $username;
            $User->complete_name = $complete_name;
            $User->password = $password;

            if ($User->save())
                return redirect()->back()->withSuccess(trans('user.modify.success'));

            return redirect()->back()->withError(trans('user.modify.inesperate'));
        }
        return redirect()->back()->withError(trans('user.modify.empty'));
    }

    public function Delete(Request $request)
    {
        $UserAuth = Auth::user();
        $User = User::where('username', $UserAuth->username)->first();

        if ($User !== NULL) {
            $User->delete();
            $this->Logout($request);
            return redirect()->home();
        }
        return redirect()->back()->withErrors(trans('user.login.empty'));
    }

    public function Login(Request $request)
    {
        $username = $request->post("username");
        $password = $request->post("password");
        $rememberme = (bool) $request->post("rememberme");

        $credentials = ['username' => $username, 'password' => $password];

        if (Auth::attempt($credentials, $rememberme)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(trans('user.login.failed'));
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->home();
    }
}
