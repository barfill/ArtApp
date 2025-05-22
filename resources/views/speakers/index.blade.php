@extends('layouts.app')

@section('title', 'Speakers')

@section('content')
    <div>
        <a href="{{ route('speakers.create') }}">
            <x-button class="create">Create Speaker</x-button>
        </a>
    </div>

     @if(session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif

    <x-table :headers="$headers">
        @foreach($speakers as $speaker)
            <tr>
                <td>{{ $speaker->id }}</td>
                <td>{{ $speaker->first_name }}</td>
                <td>{{ $speaker->last_name }}</td>
                <td>{{ $speaker->email }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('speakers.show', $speaker->id)}}">
                            <x-button class="view">View</x-button>
                        </a>
                        <a href="{{ route('speakers.edit', $speaker->id)}}">
                            <x-button class="edit">Edit</x-button>
                        </a>
                        <form action="{{ route('speakers.destroy', $speaker->id) }}" method="POST">
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
