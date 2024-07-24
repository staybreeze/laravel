<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Session;

class BackController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::first();
        if (!Session::has('admin')) {
            return redirect('/back_login');
    }else{
        return view('back', ['about' => $aboutUsData]);
    }
    }

    public function loginPage()
    {
        if (Session::has('admin')) {
            return redirect('/back');
        }
        return view('back_login');
    }

}