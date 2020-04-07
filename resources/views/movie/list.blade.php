@extends('layouts.master')

@section('title', 'Přehled filmů')

@section('content')

    <h1 class="text-2xl mt-4 font-semibold">Nejlepší filmy</h1>

    <div class="bg-white mt-4 border rounded bg-white">
        @foreach ($movies as $movie)
            <div class="p-2 flex {{$loop->iteration % 2 === 0 ? ' bg-gray-100' : ''}}">
                <span class="flex-grow">
                    {{ $movie->title }}
                </span>
                <span>
                    {{ number_format($movie->overallRating, 1, ',', '') }}
                </span>
            </div>
        @endforeach
    </div>

@stop
