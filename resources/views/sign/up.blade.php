@extends('layouts.master')

@section('title', 'Registrovat se')

@section('content')

    <div class="flex justify-center mt-4">
        <div class="bg-white p-4 w-1/2 border rounded">
            <h1 class="text-3xl">Zaregistrovat se</h1>
            <div class="mt-4">
                @foreach ($errors->getBag('registerForm')->all() as $error)
                    <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mb-2" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24">
                            <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                        </svg>
                        <p>{{$error}}</p>
                    </div>

                @endforeach
                <form name="registration_form" method="post">
                    @csrf
                    <div class="mb-4">
                        <div class="md:flex md:items-center row mb-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required" for="name">
                                    Jméno
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class=" appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light"
                                    required=""
                                >
                            </div>
                        </div>

                    </div>
                    <div class="mb-4">
                        <div class="md:flex md:items-center row mb-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required" for="email">
                                    E-mail
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="email" name="email" class=" appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" required="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="md:flex md:items-center row mb-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required" for="password">
                                    Heslo
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="password" id="password" name="password" class=" appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" required="">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="px-4 py-2 bg-red-500 rounded text-red-100 hover:bg-red-600">
                            Registrovat se
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
