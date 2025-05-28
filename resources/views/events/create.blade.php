@extends('layouts.app')

@section('title', 'Create Event')

@section('content')
    <p class="lead">Fill in the details below to create a new event.</p>

    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Event Name</label>
            <input name="name" value="{{ old('name') }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="datetime-local" name="date" value="{{ old('date') }}" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="speaker_id">Speaker</label>
            <select name="speaker_id" id="speaker_id" class="form-control">
                <option value="" disabled hidden {{ !old('speaker_id') ? 'selected' : '' }}>Select a speaker</option>
                @foreach ($speakers as $speaker)
                    <option value="{{ $speaker->id}}" {{ old('speaker_id') == $speaker->id ? 'selected' : ''}}>
                        {{ $speaker->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="location_id">Speaker</label>
            <select name="location_id" id="location_id" class="form-control">
                <option value="" disabled hidden {{ !old('location_id') ? 'selected' : '' }}>Select a location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id}}" {{ old('location_id') == $location->id ? 'selected' : ''}}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="btn-group">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Event</button>
            </div>
            <div class="form-group">
                <a href="{{ route('events.index') }}">
                    <x-button class="cancel">Cancel</x-button>
                </a>
            </div>
        </div>
    </form>
@endsection

