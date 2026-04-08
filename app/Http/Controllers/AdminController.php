<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'totalUsers' => User::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}