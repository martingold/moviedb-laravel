@extends('layouts.master')

@section('title', 'Přehled uživatelů')

@section('content')

    <h1 class="text-2xl mt-4 font-semibold">Uživatelé podle počtu hodnocení</h1>

    <div class="bg-white mt-4 border rounded bg-white">
        @foreach ($users as $user)
            <div class="p-2 flex {{$loop->iteration % 2 === 0 ? ' bg-gray-100' : ''}}">
                <span class="flex-grow">
                    {{ $user->email }}
                </span>
                <span>
                    {{ 0 }} hodnocení
                </span>
            </div>
        @endforeach
    </div>

@stop
