<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('admin')->get(); // ikut relasi admin
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:admins,id',
        ]);

        $category = Category::create($request->only(['name', 'description', 'created_by']));

        return response()->json($category, 201);
    }
}
