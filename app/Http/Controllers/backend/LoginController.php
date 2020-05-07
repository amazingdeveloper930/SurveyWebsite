<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Hash;
class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login.index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);
	
        if (Auth::guard('admin')->attempt($this->credentials($request))) {
            return redirect()->route('dashboard');
        }
/* 		$dt="123456";
echo Hash::make((string)$dt);die(); */

        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin');
    }

    protected function credentials(Request $request)
    {
        return [
            'email'     => $request->email,
            'password'  => $request->password,
            'role'      => config('users.role.admin')
        ];
    }
}
