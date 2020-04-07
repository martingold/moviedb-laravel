@extends('layouts.master')

@section('title', 'Film ' . $movie->title)

@section('content')

<div class="flex pt-4 -mx-2">
    <div class="w-2/3 mx-2 bg-white p-4 border rounded">
        <h1 class="text-4xl flex-grow">{{ $movie->title }}</h1>
        <div class="flex -mx-4 mt-2">
            <div class="w-1/3 px-4">
                <img src="{{ $movie->image_url }}" alt="">
            </div>
            <div class="w-2/3 flex flex-col">
                <div class="px-4 text-sm flex-grow">
                    {{ $movie->description }}
                </div>
                <span class="px-4 text-red-600 text-2xl font-bold text-right">
                    @if ($movie->overallRating)
                        {{ $movie->overall_rating|number_format(1, ',') }} %
                    @endif
                </span>
            </div>
        </div>
    </div>
    <div class="w-1/3 mx-2 bg-white p-4 border rounded flex flex-col">
        <h2 class="text-xl">Hodnocení uživatelů</h2>
        <div class="flex-grow">
            @forelse ($movie->ratings as $rating)
            <ul>
                <li class="p-2 border-b flex">
                    <div class="flex-grow">
                        {{ $rating->user->name }}
                    </div>
                    <div class="text-sm text-gray-700 flex items-center">
                        <div class="mr-2">
                            {{ $rating->rating }} / 10
                        </div>
                        <div>
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/>
                            </svg>
                        </div>
                    </div>
                </li>
            </ul>
            @empty
            <div class="flex justify-center mt-4">
                <h3 class="text-gray-600">
                    Film zatím nemá žádné hodnocení
                </h3>
            </div>
            @endforelse
        </div>
        @if (Auth::check())
        <a href="{{ route('movie_comment', ['slug' => $movie->slug]) }}"
           class="p-2 cursor-pointer rounded border border-red-600 text-white text-center font-semibold text-red-600 hover:text-white hover:bg-red-600">
            Ohodnotit film
        </a>
        @else
        <div class="text-sm text-center text-gray-500 my-2">
            Pro hodnocení filmů se musíte nejdříve
            <a href="{{ route('sign_in') }}" class="text-red-400">
                přihlásit
            </a>
            nebo
            <a href="{{ route('sign_up') }}" class="text-red-400">
                zaregistrovat
            </a>
            .
        </div>
        <div
            class="p-2 cursor-pointer rounded border border-red-300 text-white text-center font-semibold text-red-300">
            Ohodnotit film
        </div>
         @endif
    </div>
</div>

<div>
    <div class="flex mt-4">
        @foreach ($movie->ratings as $rating)
        <div class="w-1/3 rounded overflow-hidden border flex-grow">
            <div class="bg-red-600 flex p-2">
                <div class="flex-grow text-white">
                    {{ $rating->user->name }}
                </div>
                <div class="text-sm text-gray-200 flex items-center">
                    <div class="mr-2">
                        {{ $rating->rating }} / 10
                    </div>
                    <div>
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                             height="24"
                             viewBox="0 0 24 24">
                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 text-gray-700">
                {{ $rating->comment }}
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
