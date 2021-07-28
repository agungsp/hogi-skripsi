<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <style>
        main {
            margin-top: 7rem;
        }

        .bg-default {
            background-color: #eee;
        }

        .card {
            border-radius: 1rem;
        }

        .container-result {
            height: 78vh;
            overflow: auto;
            overflow-x: hidden !important;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 0.7rem;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            /* box-shadow: inset 0 0 5px grey; */
            background-color: #CED4DA;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: var(--bs-primary);
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #0A58CA;
        }

    </style>
    @yield('css')
</head>
<body class="bg-default">
    <nav class="navbar navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/icons8_person_50px.png') }}" alt="logo" width="40" height="40" class="d-inline-block align-text-middle">
                Hogi Eka C
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row mt-5">
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>

    @yield('modal')

    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function ajaxFormDataSetup(url, formData, onSuccess, onError, type = 'POST') {
            return {
                type: type,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: onSuccess,
                error: onError
            }
        }
    </script>
    @yield('js')
</body>
</html>
