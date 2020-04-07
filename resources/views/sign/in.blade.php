@extends('layouts.master')

@section('title', 'Přihlásit se')

@section('content')

    <div class="flex justify-center">
        <div class="bg-white p-4 w-1/2 mt-4 border rounded">
            <h1 class="text-3xl mb-3">Přihlásit se</h1>
            <form method="post">
                @csrf
                <div class="mb-4">
                    <div class="md:flex md:items-center row mb-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required" for="email">E-mail</label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="text" id="email" name="email" class="appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" required="">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="md:flex md:items-center row mb-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-800 font-semibold md:text-right mb-1 md:mb-0 pr-4 required" for="password">Heslo</label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="password" id="password" name="password" class="appearance-none bg-grey-lighter border border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" required="">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mb-4">
                    <button class="px-4 py-2 bg-red-500 text-gray-100 rounded hover:bg-red-600" type="submit">
                        Přihlásit se
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
