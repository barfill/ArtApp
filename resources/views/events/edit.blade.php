@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
    <p class="lead">Update the details below to edit the event.</p>

    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Event Name</label>
            <input name="name" value="{{ old('name', $event->name) }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="datetime-local" name="date" value="{{ old('date', $event->date) }}" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="speaker_id">Speaker</label>
            <select name="speaker_id" id="speaker_id" class="form-control">
                @foreach ($speakers as $speaker)
                    <option value="{{ $speaker->id }}" {{ old('speaker_id', $event->speaker_id) == $speaker->id ? 'selected' : '' }}>
                        {{ $speaker->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="location_id">Location</label>
            <select name="location_id" id="location_id" class="form-control">
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" {{ old('location_id', $event->location_id) == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="btn-group">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Event</button>
            </div>
            <div class="form-group">
                <a href="{{ session('redirect_to', route('events.index')) }}">
                    <x-button class="cancel">Cancel</x-button>
                </a>
            </div>
        </div>
    </form>
@endsection
