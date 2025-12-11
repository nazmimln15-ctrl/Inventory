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
            // Kolom ID selalu berguna
            'id' => $this->id, 
            
            // Mengubah nama key agar lebih deskriptif untuk klien
            'nama_barang' => $this->name, 
            'kode_unik' => $this->code,
            
            // Menambahkan data kustom/terhitung
            'detail_inventaris' => [
                'satuan' => $this->unit,
                'sisa_stok' => $this->stock,
                'harga_jual' => $this->price,
                'lokasi_gudang' => $this->location,
            ],
            
            // Contoh format tanggal
            'tanggal_terdaftar' => $this->created_at->format('Y-m-d H:i:s'), 
        ];
    }
}