@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>

                            <div>

                                <div class="student_profile" style="display:flex">

                                    <div class="student-image" style="margin:2rem">

                                        <img src="{{ url('public/Image/' . $data->image) }}" width="500px" height="300px"
                                            style="object-fit: cover" alt="Student Image" />

                                    </div>

                                    <div class="student_info" style="margin:2rem">

                                        <div class="student-name" style="font-size: 30px">
                                            {{ $data->name }}
                                        </div>
                                        <h4 style="text-decoration:underline">Contact Info</h4>
                                        <div class="contact-info" style="font-size: 15px; ">
                                            <h5>{{ $data->email }}</h5>
                                            <h5>{{ $data->phone_no }}</h5>
                                            <h5>{{ $data->address }}</h5>
                                        </div>

                                        <div class="gender">
                                            <h6>Gender : {{ $data->gender }}</h6>
                                        </div>
                                        <div class="date-of-birth">
                                            <h6>DoB : {{ $data->dob }}</h6>
                                        </div>
                                        <div>
                                            <div class="d-flex" style="justify-content: space-between">
                                                <button class="edit-student-details btn btn-warning"><a
                                                        href="{{ route('student.edit', ['student' => $data->id]) }}"
                                                        style="text-decoration: none;color:white; margin-right:0px">Edit</a></button>
                                                {{-- <button class="delete-student-details btn btn-danger"><a href="{{ route('student.destroy',['student'=>$data->id]) }}" style="text-decoration: none;color:white">Delete</a></button></td> --}}
                                                
                                                    <form action="{{ route('student.destroy', ['student' => $data->id]) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="delete-student-details btn btn-danger">Delete</button>
                                                    </form>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="education_info " style="text-align: center">

                                    <h3>Education Info</h3>

                                    <table class="table">

                                        <thead>

                                            <tr>
                                                <th scope="col">Level</th>
                                                <th scope="col">College</th>
                                                <th scope="col">University/Board</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>


                                            </tr>
                                        </thead>
                                        @foreach ($education_data as $item)
                                            <tr>
                                                <td>{{ $item->level }}</td>
                                                <td>{{ $item->college }}</td>
                                                <td>{{ $item->university }}</td>
                                                <td>{{ $item->startdate }}</td>
                                                <td>{{ $item->enddate }}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
