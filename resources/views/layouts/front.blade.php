<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title') | Laptop World
    </title>
    <link rel="shortcut icon" href="{{ asset('assets/logo/transFavicon.png') }}" type="image/png">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">

    {{-- Owl Carousel --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

</head>

<body>

    @include('layouts.include.frontnav')

    <div class="loader">
        <div></div>
    </div>

    <div class="content">
        @yield('content')
    </div>

    @include('layouts.include.frontfooter')

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- Auto Complete -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @if (session('success'))
        <script>
            swal("", "{{ session('success') }}", "success");
        </script>
    @endif
    @if (session('error'))
        <script>
            swal("", "{{ session('error') }}", "error");
        </script>
    @endif
    @if (session('timer'))
        <script>
            swal("{{ session('timer') }}", {
                timer: 1500,
                icon: "success",
                buttons: false,
            });
        </script>
    @endif

    <script>
        $(function() {
            $(document).tooltip();
        });

        $(document).ready(function() {
            src = "{{ route('searchproductajax') }}";
            $("#search_text").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1,
            });
            $(document).on('click', '.ui-menu-item', function() {
                $('#search-form').submit();
            });
        });
    </script>

    @yield('scripts')

</body>

</html>
