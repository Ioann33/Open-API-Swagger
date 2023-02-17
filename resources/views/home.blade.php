@extends('layouts.app')

@section('content')
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
                <a href="{{route('getUsers', ['perPage'=>count($users)+6])}}" class="btn btn-warning w-100">Show more</a>
            </div>
        </div>
    </div>
@endsection
