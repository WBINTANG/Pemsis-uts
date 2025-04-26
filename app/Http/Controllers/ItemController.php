<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'supplier', 'admin'])->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'created_by' => 'required|exists:admins,id',
        ]);

        $item = Item::create($request->only([
            'name', 'description', 'price', 'quantity', 'category_id', 'supplier_id', 'created_by'
        ]));

        return response()->json($item, 201);
    }

    // Method untuk ringkasan stok barang
    public function stockSummary()
    {
        $totalStock = DB::table('items')->sum('quantity');
        $totalValue = DB::table('items')->selectRaw('SUM(price * quantity) as total_value')->value('total_value');
        $avgPrice = DB::table('items')->avg('price');

        return response()->json([
            'total_stock' => $totalStock,
            'total_value' => $totalValue,
            'average_price' => round($avgPrice, 2),
        ]);
    }

    // Method untuk menampilkan item dengan stok kurang dari 5
    public function lowStock()
    {
        $items = Item::where('quantity', '<', 5)
                    ->with(['category', 'supplier', 'admin'])
                    ->get();

        return response()->json($items);
    }
}
