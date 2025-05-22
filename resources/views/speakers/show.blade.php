@extends('layouts.app')

@section('title', 'Speaker Details')

@section('content')
    <div>
        <h2>{{ $speaker->name }}</h2>
        <p><strong>First name:</strong> {{ $speaker->first_name }}</p>
        <p><strong>Last name:</strong> {{ $speaker->last_name }}</p>
        <p><strong>Email:</strong> {{ $speaker->email }}</p>

        <div class="btn-group">
            <a href="{{ route('speakers.edit', $speaker->id) }}">
                <x-button class="edit">Edit</x-button>
            </a>
            <form action="{{ route('speakers.destroy', $speaker->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="delete">Delete</x-button>
            </form>
            <a href="{{ route('speakers.index') }}">
                <x-button class="cancel">Back to speakers</x-button>
            </a>
        </div>
    </div>
@endsection
