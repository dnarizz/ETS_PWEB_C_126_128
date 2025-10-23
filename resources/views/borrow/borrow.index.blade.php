@extends('layouts.app')

@section('content')
<h2>Buku yang Sedang Kamu Pinjam</h2>

@foreach ($borrowings as $borrow)
    <div>
        <strong>{{ $borrow->book->title }}</strong> 
        - Status: {{ $borrow->status }}
        @if ($borrow->status === 'borrowed')
            <form method="POST" action="{{ route('borrow.return', $borrow->id) }}">
                @csrf
                <button type="submit">Kembalikan</button>
            </form>
        @endif
    </div>
@endforeach
@endsection
