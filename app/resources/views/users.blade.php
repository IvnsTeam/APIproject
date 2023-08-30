@extends('layouts.app')

@section('content')
    <h1>Список пользователей</h1>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection