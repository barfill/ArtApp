@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div>
        <a href="{{ route('events.create') }}">
            <x-button class="create">Create Event</x-button>
        </a>
    </div>

    @if(session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif
    {{-- @if(session('error'))
        <x-alert type="danger" class="alert">
            {{ session('error') }}
        </x-alert>
    @endif --}}

    <x-table :headers="$headers">
        @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->description }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('events.show', $event->id)}}">
                            <x-button class="view">View</x-button>
                        </a>
                        <a href="{{ route('events.edit', $event->id)}}">
                            <x-button class="edit">Edit</x-button>
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
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
