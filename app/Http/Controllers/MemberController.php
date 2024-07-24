<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
    
        if (!session()->has('user')) {
            return redirect()->route('logging');
        }
        return view('member');
    }
}
