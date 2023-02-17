<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="container">
                <div class="row row-cols-2 row-cols-lg-3">
                    @foreach($users as $user)
                    <div class="col">

                        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-2">
                                            <img src="{{$user->photo}}" class="img-fluid rounded-start" alt="photo">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$user->name}}</h5>
                                                <p class="card-text">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning w-100">Show more</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
