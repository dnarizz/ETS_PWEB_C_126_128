@extends('layouts.app')

@section('content')
<h2>Pinjam Buku: {{ $book->title }}</h2>

<form method="POST" action="{{ route('borrow.store', $book->id) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Pinjam Sekarang</button>
</form>
@endsection
