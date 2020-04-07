@extends('layouts.master')

@section('title', 'Ohodnotit film ' . $movie->title)

@section('content')

    <div class="bg-white p-4 bg-white">
        <h1 class="text-3xl">Ohodnotit film {{ $movie->title }}</h1>
        <div class="flex mt-4">
            <div class="w-full">
                <form name="add_comment_form" method="post">
                    @csrf
                    <div class="mb-4">
                        <div class="md:flex md:items-center row mb-2">
                            <div class="md:w-1/3">
                                <label
                                    class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required"
                                    for="input_comment"
                                >
                                    Komentář
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea
                                    class="appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light"
                                    id="input_comment"
                                    name="comment"
                                    required="required"
                                >{{$rating->comment}}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="mb-4">
                        <div class="md:flex md:items-center row mb-2">
                            <div class="md:w-1/3">
                                <label
                                    class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required"
                                    for="input_rating"
                                >
                                    Hodnoceni
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="number"
                                       id="input_rating"
                                       name="rating"
                                       class="appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light"
                                       value="{{ $rating->rating }}" required/>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="px-4 py-2 bg-red-500 rounded text-red-100 hover:bg-red-600">
                            Ohodnotit
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
