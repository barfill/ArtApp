@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
    <div>
        <h2>{{ $event->name }}</h2>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <p><strong>Speaker:</strong> {{ $event->speaker->full_name }}</p>
        <p><strong>Location:</strong> {{ $event->location->name }}</p>


        <div class="btn-group">
            <a href="{{ route('events.edit', $event->id) }}">
                <x-button class="edit">Edit</x-button>
            </a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="delete">Delete</x-button>
            </form>
            <a href="{{ route('events.index') }}">
                <x-button class="cancel">Back to Events</x-button>
            </a>
        </div>
    </div>
@endsection
