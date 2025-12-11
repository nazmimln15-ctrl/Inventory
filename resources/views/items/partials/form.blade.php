<div class="mb-2">
    <label>Nama Barang</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $item->name ?? '') }}">
</div>
<div class="mb-2">
    <label>Kode</label>
    <input type="text" name="code" class="form-control" value="{{ old('code', $item->code ?? '') }}">
</div>
<div class="mb-2">
    <label>Satuan</label>
    <input type="text" name="unit" class="form-control" value="{{ old('unit', $item->unit ?? '') }}">
</div>
<div class="mb-2">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $item->stock ?? 0) }}">
</div>
<div class="mb-2">
    <label>Harga</label>
    <input type="number" step="0.01" name="price" class="form-control"
        value="{{ old('price', $item->price ?? 0) }}">
</div>
<div class="mb-2">
    <label>Lokasi</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $item->location ?? '') }}">
</div>
