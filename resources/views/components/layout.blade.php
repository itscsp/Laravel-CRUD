<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
                corePlugins: {
        container: false
      },

    plugins: [
        // require('@tailwindcss/forms'),
        function ({ addComponents }) {
            addComponents({
              '.container': {
                maxWidth: '100%',
                '@screen sm': {
                  maxWidth: '640px',
                },
                '@screen md': {
                  maxWidth: '768px',
                },
                '@screen lg': {
                  maxWidth: '933px',
                },
                '@screen xl': {
                  maxWidth: '933px',
                },
              }
            })
          }
    
    ],
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class=" ">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="logo" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcom {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage</a
                    >
                </li>
                <li>
                    <form  class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid-closed"></i>Logout
                        </button>
                    </form>
                </li>
              @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>

    {{-- VIEW OUTPUT  --}}
    <main class=" m-auto">
        {{-- @yield('content') --}}
        {{$slot}}
    </main>
    <footer 
    class=" flex items-center justify-between font-bold bg-laravel text-white h-24 mt-24 opacity-90 "
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    @auth
        <a
        href="/listings/create"
        class="mr-2 top-1/3 right-10 border-2 text-white py-2 px-5"
        >Post Job</a
        >
        @else
        <a
            href="/register"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 mr-2 hover:text-black hover:border-black"
            >Sign Up to List a Gig</a
        >
    @endauth
</footer>
</body>
</html>
