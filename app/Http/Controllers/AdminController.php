<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Tampilkan semua admin
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins);
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            // Hash password biar aman
            'password' => Hash::make($request->password),
        ]);

        return response()->json($admin, 201);
    }
}
