<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('admin')->get();
        return response()->json($suppliers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:suppliers',
            'contact_info' => 'nullable|string|max:100',
            'created_by' => 'required|exists:admins,id',
        ]);

        $supplier = Supplier::create($request->only(['name', 'contact_info', 'created_by']));

        return response()->json($supplier, 201);
    }
}
