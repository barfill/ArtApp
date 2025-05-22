@extends('layouts.app')

@section('title', 'Locations')

@section('content')
    <div>
        <a href="{{ route('locations.create') }}">
            <x-button class="create">Create location</x-button>
        </a>
    </div>

    @if(session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif

    <x-table :headers="$headers">
        @foreach ($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('locations.show', $location->id)}}">
                            <x-button class="view">View</x-button>
                        </a>
                        <a href="{{ route('locations.edit', $location->id)}}">
                            <x-button class="edit">Edit</x-button>
                        </a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" class="delete">Delete</x-button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
@endsection
