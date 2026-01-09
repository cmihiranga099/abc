<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }
}
