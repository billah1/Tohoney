<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        // dd(1);
        $user = Auth::user();
        return view('Frontend.pages.customer-dashboard', compact('user'));
    }
}
