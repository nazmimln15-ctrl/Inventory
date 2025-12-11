<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Resources\ItemResource;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:items,code',
            'stock' => 'nullable|integer',
            'price' => 'nullable|numeric',
        ]);
         

        $item = Item::create($validatedData);

        // Kembalikan Resource dengan status 201
        return new ItemResource($item); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
      return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Temukan Item
        // Kita gunakan findOrFail untuk memastikan item ada, jika tidak, otomatis Laravel akan melempar 404
        $item = Item::findOrFail($id);

        // 2. Validasi Data
        $validatedData = $request->validate([
            'name' => 'sometimes|required', // 'sometimes' hanya validasi jika field dikirim
            
            // Penting: Abaikan ID item saat ini dari validasi 'unique'
            'code' => 'sometimes|required|unique:items,code,' . $item->id,
            
            'stock' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'unit' => 'nullable|string',      // Tambahkan validasi untuk field lain
            'location' => 'nullable|string',  // Tambahkan validasi untuk field lain
        ]);

        // 3. Perbarui Database
        $item->update($validatedData);

        // 4. Kembalikan Response Sukses
        return response()->json([
            'message' => 'Barang berhasil diperbarui.',
            'data' => $item
        ], 200); // 200 OK
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        // Kembalikan Response Sukses
        return response()->json([
            'message' => 'Produk berhasil dihapus.'
        ], 204); // 204 No Content (Sukses tapi tidak ada body yang dikembalikan)
    }
}

