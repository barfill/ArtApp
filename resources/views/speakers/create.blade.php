@extends('layouts.app')

@section('title', 'Create Speaker')

@section('content')
    <p class="lead">Fill in the details below to create a new speaker.</p>

    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('speakers.store') }}">
        @csrf
        <div class="form-group">
            <label for="first_name">Speaker First Name</label>
            <input name="first_name" value="{{ old('first_name') }}" id="first-name" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name">Speaker Last Name</label>
            <input name="last_name" value="{{ old('last_name') }}" id="last-name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Speaker Email</label>
            <input name="email" value="{{ old('email') }}" id="email" class="form-control">
        </div>
        <div class="btn-group">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Speaker</button>
            </div>
            <div class="form-group">
                <a href="{{ route('speakers.index') }}">
                    <x-button class="cancel">Cancel</x-button>
                </a>
            </div>
        </div>
    </form>
@endsection

