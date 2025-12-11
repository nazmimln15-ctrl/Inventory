<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
  
            'id' => $this->id, 
            'nama_barang' => $this->name, 
            'kode_unik' => $this->code,
            

            'detail_inventaris' => [
                'satuan' => $this->unit,
                'sisa_stok' => $this->stock,
                'harga_jual' => $this->price,
                'lokasi_gudang' => $this->location,
            ],
            
            'tanggal_terdaftar' => $this->created_at->format('Y-m-d H:i:s'), 
        ];
    }
}