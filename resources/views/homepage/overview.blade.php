@extends('layouts.master')

@section('title', 'MovieDB')

@section('content')

    <div class="my-4">
        <h1 class="text-3xl">Nejnovější filmy a seriály</h1>
        <div class="flex flex-row -mx-2">
            @foreach ($movies as $movie)
            <a href="{{route('movie_detail', ['slug' => $movie->slug]) }}"
               class="m-2 w-1/3 bg-gray-100 rounded overflow-hidden border shadow border-gray-white flex-col">
				<span
                    class="block bg-cover bg-no-repeat h-64"
                    style="background-image: url('{{ $movie->image_url }}')"
                ></span>
                <span class="m-4 block">
					<span class="block flex items-center justify-between">
						<span class="flex items-center">
							<span class="text-2xl text-gray-800 font-semibold">
								{{ $movie->title }}
							</span>
							<span class="text-xl text-red-600 ml-2 pr-4">
								@if ($movie->overall_rating)
                                    {{ number_format($movie->overall_rating, 1, ',', '') }}
                                    <span class="text-sm">%</span>
                                @endif
							</span>
						</span>
						<span class="text-xs text-gray-500 items-center">
							přidáno {{ $movie->created_at->format('d.m.Y') }}
						</span>
					</span>
					<span class="block mt-2 text-gray-800 text-justify"
                          style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden;">
						{{ $movie->description }}
					</span>
					<span class="block flex justify-between mt-2 items-center">
                        <span class="text-red-500 text-2xl">
                            @for ($i = 0; $i < $movie->stars(); $i++)
                                &#9733;
                            @endfor

                            @for ($i = 0; $i < 5 - $movie->stars(); $i++)
                                &#9734;
                            @endfor
                        </span>

						<span class="text-gray-500 cursor-pointer hover:text-red-800 align">
							Přejít na detail &gt;&gt;
						</span>
					</span>
				</span>
            </a>
            @endforeach
        </div>
        <h2 class="text-2xl my-4">Nejnovější komentáře</h2>
        <div class="flex -mx-2">
            @foreach ($ratings as $rating)
            <div class="w-1/3 rounded overflow-hidden border shadow flex-grow flex-col flex bg-white mx-2">
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
                <div class="p-4 flex flex-col flex-grow">
                    <div class="text-xl">
                        {{ $rating->movie->title }}
                    </div>
                    <div class="text-gray-700 flex-grow">
                        <div style="display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $rating->comment }}
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('movie_detail', ['slug' => $movie->slug]) }}" class="p-4 text-red-600">
                            Přejít na detail filmu >>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>

@stop
