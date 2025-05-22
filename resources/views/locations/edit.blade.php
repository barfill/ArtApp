@extends('layouts.app')

@section('title', 'Edit Location')

@section('content')
    <p class="lead">Update the details below to edit the location.</p>

    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('locations.update', $location->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Location Name</label>
            <input name="name" value="{{ old('name', $location->name) }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Location Address</label>
            <input name="address" value="{{ old('address', $location->address) }}" id="address" class="form-control">
        </div>
        <div class="btn-group">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Location</button>
            </div>
            <div class="form-group">
                <a href="{{ session('redirect_to', route('locations.index')) }}">
                    <x-button class="cancel">Cancel</x-button>
                </a>
            </div>
        </div>
    </form>
@endsection
