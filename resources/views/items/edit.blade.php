@extends('layouts.app')
@section('content')
    <h2>Edit Barang</h2>
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        @include('items.partials.form')
        <button class="btn btn-primary mt-2">Update</button>
    </form>
@endsection
