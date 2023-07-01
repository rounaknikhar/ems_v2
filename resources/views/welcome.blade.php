@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card rounded m-2 m-md-0 h-100">
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="flex-grow-1 h-100">
                                <h5 class="card-title">Clock in</h5>
                                <p class="card-text">
                                    If you are an employee, about to start your shift,
                                    please click on the clock in button and follow the
                                    steps to register you entry
                                </p>
                            </div>
                            <a href="{{ route('clock-in') }}" class="btn btn-secondary w-100 mt-4">Clock in</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="card rounded m-2 m-md-0 h-100">
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="flex-grow-1 h-100">
                                <h5 class="card-title">Management</h5>
                                <p class="card-text">
                                    If you are a member of management stuff,
                                    please log in using your admin credentials
                                </p>
                            </div>
                            @if (Auth::guest())
                                <a href="{{ route('login') }}" class="btn btn-secondary w-100 mt-4">Login</a>
                            @else
                                <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-4">Dashboard</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
