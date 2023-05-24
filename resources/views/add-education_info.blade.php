@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Education Information') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            {{-- <form action="{{ route('education.store',['student_id' =>student()->id]) }}" method="post"> --}}
                                <form action="#" method="post">
                                @csrf

                                <table class="table" style="text-align: center">

                                    <thead>

                                      <tr>
                                        <th scope="col">Level</th>
                                        <th scope="col">College</th>
                                        <th scope="col">University/Board</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Actions</th>

                                      </tr>
                                    </thead>
                                      <tr>
                                        <td><input type="text" id="level" name="level" class="form-control" placeholder="Level" aria-label="City" style="text-align: center"></td>
                                        <td><input type="text" id="college" name="college" class="form-control" placeholder="College" aria-label="State" style="text-align: center"></td>
                                        <td><input type="text" id="uni" name="uni" class="form-control" placeholder="University/Board" aria-label="State" style="text-align: center"></td>
                                        <td><input type="date" class="form-control" id="startdate" name="startdate"></td>
                                        <td><input type="date" class="form-control" id="enddate" name="enddate"></td>
                                        <td>
                                            <a class="btn btn-block btn-danger sa-danger remove_row "><i class="bi bi-trash3"></i></a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>


                            </form>

                        </div>

                        <div
                            style="display: flex; flex-direction: row; justify-content:space-between;width:60%; margin:auto; padding-top:5px;">

                            <div class="add_more">
                                <button class="btn btn-warning" type="button">Add more </button>
                            </div>


                            <div class="add_more">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>


                        </div>

                        



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
