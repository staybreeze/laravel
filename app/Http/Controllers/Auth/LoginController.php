<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{    public function index()
    {
        if (Session::has('user')) {
            return redirect('/member');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        Log::info('Login attempt for user: ' . $request['acc']);
    
        $user = User::where('acc', $request['acc'])->first();
    
        // if (!$user) {
        //     Log::warning('Login failed for user: ' . $request['acc'] . ' - user not found');
        //     return redirect()->back()->with('error', '帳號不存在。');
            
        // }
    
        if ($user && $request['pw'] == $user->pw) {

            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->put('user', $request['acc']);
            Log::info('Login successful for user: ' . $request['acc']);
            return redirect()->route('session.to.cart');
            // return redirect()->route('home.index')->with('login_success', '登入成功！');
        } else {
            Log::warning('Login failed for user: ' . $request['acc'] . ' - incorrect password or account does not exist');
            return redirect()->back()->with('login_error', '帳號或密碼錯誤。');
        }
    
    }
    public function backLogin(Request $request)
    {
        $admin = Admin::where('acc', $request['acc'])->first();
    
        if ($admin && $request['pw'] == $admin->pw) {

            $request->session()->regenerate();
            $request->session()->put('admin', $request['acc']);
            Log::info('Login successful for admin: ' . $request['acc']);
            return redirect()->route('back');
            // return redirect()->route('home.index')->with('login_success', '登入成功！');
        } else {
            Log::warning('Login failed for user: ' . $request['acc'] . ' - incorrect password or account does not exist');
            return redirect()->back()->with('login_error', '帳號或密碼錯誤。');
        }
    
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('user');
        $request->session()->forget('good');
        $request->session()->forget('admin');
        $request->session()->forget('cart');
        return redirect('/');
    }
}