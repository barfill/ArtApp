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

