@extends('layouts.app')

@section('content')
    <h1>Favorites</h1>

    @if ($favorites->count())
        <ul>
            @foreach ($favorites as $favorite)
                <li>
                    <a href="{{ route('microposts.show', $favorite->id) }}">{{ $favorite->content }}</a>
                    <form method="POST" action="{{ route('favorites.destroy', $favorite->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unfavorite</button>
                    </form>
                </li>
            @endforeach
        </ul>

        {{ $favorites->links() }}
    @else
        <p>No favorites yet.</p>
    @endif
@endsection
