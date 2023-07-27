<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

        <title>Sijambu | Books</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        
        <script>
            let headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        </script>
        
        <script defer src="{{ asset('js/vendor.js') }}"></script>
        <script defer src="{{ asset('js/main.js') }}"></script>
        <link href="{{ asset('css/bundle.f17d4bb1aecc90e8c307.css') }}" rel="stylesheet"></head>
    </head>
    <body>
        @yield('header')

        <main>
            @yield('main')
        </main>

        @yield('footer')

        <!-- Icons -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

        <!-- SweetAlert for deleteconfirmation -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            // icons
            feather.replace();
        </script>

        @yield('script')
    </body>
</html>

