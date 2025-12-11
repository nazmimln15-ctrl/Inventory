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
    public function index(Request $request)
    {
        $query = Item::query();


        if ($request->has('stock_limit')) {
            $query->where('stock', '<=', $request->stock_limit);
        }

        if ($request->has('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('code', 'like', '%' . $request->keyword . '%');
            });
        }

        $items = $query->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar Item .',
            'data' => $items
        ], 200);
    }

//     public function index() {
//     $items = Item::all();
//     return response()->json($items);
// }

    // public function index()
    // {
    //     $items = Item::all();
    //     return ItemResource::collection($items);
    // }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:items,code',
            'stock' => 'nullable|integer',
            'price' => 'nullable|numeric',
        ]);


        $item = Item::create($validatedData);

        return new ItemResource($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }

}
