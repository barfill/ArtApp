@extends('layouts.app')

@section('title', 'Location Details')

@section('content')
    <div>
        <h2>{{ $location->name }}</h2>
        <p><strong>Address:</strong> {{ $location->address }}</p>

        <div class="btn-group">
            <a href="{{ route('locations.edit', $location->id) }}">
                <x-button class="edit">Edit</x-button>
            </a>
            <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="delete">Delete</x-button>
            </form>
            <a href="{{ route('locations.index') }}">
                <x-button class="cancel">Back to Locations</x-button>
            </a>
        </div>
    </div>
@endsection
