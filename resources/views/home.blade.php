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
                        <div class="dashboard-section" style="  margin:auto;">
                            <div class="dashboard-body" style=" margin:1rem 5rem; width:80%; height:15vh; align-items:center;">
                                <h2 style="text-align: center">The total number of registered students are:</h2>
                                <h1 style="font-weight: 1000px; text-align:center"> {{$data}}</h1>
                            </div>

                            <div style="display:flex;flex-direction:row; justify-content:space-between; width:60%; margin:auto; padding-bottom:.7rem">
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
    </div>
@endsection
