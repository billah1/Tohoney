<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
