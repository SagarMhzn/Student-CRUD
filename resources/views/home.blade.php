@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div style="display:flex; justify-content:space-around">
                            <div>
                                <button class="btn btn-primary" style=""><a href="{{ route('student.create') }}"
                                        style="text-decoration: none;color:white">create student</a></button>
                            </div>

                            <div>
                                <button class="btn btn-primary" style=""><a href="{{ route('view-students') }}"
                                        style="text-decoration: none;color:white">view student</a></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
