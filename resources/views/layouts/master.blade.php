<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="container mx-auto bg-gray-100">
<nav class="flex items-center justify-between flex-wrap bg-red-600 p-6 rounded-b">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="{{ route('homepage_overview') }}" class="font-semibold text-xl tracking-tight">MovieDB</a>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm">
            <a href="{{ route('movie_list') }}"
               class="block mt-4 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                Filmy
            </a>
        </div>
        @if (Auth::check() && Auth::user()->isAdmin())
            <div class="text-sm">
                <a href="{{ route('movie_add') }}"
                   class="block mt-4 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                    Přidat film
                </a>
            </div>
        @endif
        <div class="text-sm lg:flex-grow">
            <a href="{{ route('user_list') }}"
               class="block mt-4 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                Uživatelé
            </a>
        </div>
        <div>
            @if (Auth::check())
                <span class="text-white px-4">
                    {{ Auth::user()->name }}
                </span>
                <a href="{{ route('sign_out') }}"
                   class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-red-500 hover:bg-white mt-4 lg:mt-0">
                    Odhlásit se
                </a>
            @else
                <a href="{{ route('sign_in') }}"
                   class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-red-500 hover:bg-white mt-4 lg:mt-0">
                    Přihlásit se
                </a>
                <a href="{{ route('sign_up') }}"
                   class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-red-500 hover:bg-white mt-4 lg:mt-0">
                    Zaregistrovat se
                </a>
            @endif
        </div>
    </div>
</nav>

{{--{% for type, messages in app.flashes %}--}}
{{--<div class="flash flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mt-4" role="alert">--}}
{{--    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--         viewBox="0 0 24 24">--}}
{{--        <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>--}}
{{--    </svg>--}}
{{--    <p>{{ messages[0] }}</p>--}}
{{--</div>--}}
{{--{% endfor %}--}}

@yield('content')

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
