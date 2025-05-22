@extends('layouts.app')

@section('title', 'Create location')

@section('content')
    <p class="lead">Fill in the details below to create a new location.</p>

    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('locations.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Location Name</label>
            <input name="name" value="{{ old('name') }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Location Address</label>
            <input name="address" value="{{ old('address') }}" id="address" class="form-control">
        </div>
        <div class="btn-group">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create location</button>
            </div>
            <div class="form-group">
                <a href="{{ route('locations.index') }}">
                    <x-button class="cancel">Cancel</x-button>
                </a>
            </div>
        </div>
    </form>
@endsection

