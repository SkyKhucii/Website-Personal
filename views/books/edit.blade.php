@extends('layouts.app')

@section('content')
<h3>Edit Buku</h3>

<form method="POST" action="{{ route('books.update', $book) }}">
@csrf
@method('PUT')

<input type="text" name="title" value="{{ $book->title }}">
<input type="text" name="author" value="{{ $book->author }}">
<input type="number" name="year" value="{{ $book->year }}">

<select name="category_id">
@foreach($categories as $category)
<option value="{{ $category->id }}" 
{{ $book->category_id == $category->id ? 'selected' : '' }}>
{{ $category->name }}
</option>
@endforeach
</select>

<button type="submit">Update</button>
</form>
@error('title')
    <small class="text-danger">{{ $message }}</small>
@enderror

@endsection
