@extends('layouts.app')

@section('content')
<h3>Tambah Kategori</h3>

<form method="POST" action="{{ route('categories.store') }}">
@csrf
<input type="text" name="name" placeholder="Nama Kategori">
<button type="submit">Simpan</button>
</form>
@endsection
