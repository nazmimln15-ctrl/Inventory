@extends('layouts.app')
@section('content')
    <h2>Tambah Barang</h2>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        @include('items.partials.form')
        <button class="btn btn-primary mt-2">Simpan</button>
    </form>
@endsection

