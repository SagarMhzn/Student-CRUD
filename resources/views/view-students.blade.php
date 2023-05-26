@extends('layouts.app')

@section('content')
<div class="container" style="width:100%">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List of Students') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="show-students" style="">

                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone No.</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $student)
                                    <tr >
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone_no }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->dob }}</td>
                                        <td><button class="view-more-details btn btn-secondary"><a href="{{ route('view-profile', ['id'=>$student->id]) }}" style="text-decoration: none;color:white">View More</a></button>
                                        <button class="edit-student-details btn btn-warning"><a href="/students-edit/{{ $student->id }}" style="text-decoration: none;color:white">Edit</a></button>
                                        <button class="delete-student-details btn btn-danger"><a href="/students-delete/{{ $student->id }}" style="text-decoration: none;color:white">Delete</a></button></td>
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
@endsection