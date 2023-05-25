@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Student Form') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <style>
                            /* Style the form */
                            #regForm {
                                background-color: #ffffff;
                                margin: auto;
                                padding: 40px;
                                width: 100%;
                                min-width: 300px;
                            }

                            /* Style the input fields */
                            input {
                                padding: 10px;
                                width: 100%;
                                font-size: 17px;
                                font-family: Raleway;
                                border: 1px solid #aaaaaa;
                            }

                            /* Mark input boxes that gets an error on validation: */
                            input.invalid {
                                background-color: #ffdddd;
                            }

                            /* Hide all steps by default: */
                            .tab {
                                display: none;
                            }

                            /* Make circles that indicate the steps of the form: */
                            .step {
                                height: 15px;
                                width: 15px;
                                margin: 0 2px;
                                background-color: #bbbbbb;
                                border: none;
                                border-radius: 50%;
                                display: inline-block;
                                opacity: 0.5;
                            }

                            /* Mark the active step: */
                            .step.active {
                                opacity: 1;
                            }

                            /* Mark the steps that are finished and valid: */
                            .step.finish {
                                background-color: #04AA6D;
                            }
                        </style>
                        <form id="regForm" action="{{ route('student.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <h1>Register:</h1>

                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <h3>Student Details</h3>
                                <p>
                                    <input placeholder="Name" onchange="this.className = ''"  name="name" type="text" class="name">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                                <p><input placeholder="Phone No." oninput="this.className = ''" name="phone_no" class="phone_no"
                                        type="number">
                                    @error('phone-no')
                                        {{ $message }} class=""
                                    @enderror
                                </p>
                                <p><input placeholder="Address" oninput="this.className = ''" name="address" type="text" class="address">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </p>
                                <p><input placeholder="E-mail" oninput="this.className = ''" name="email" type="email" class="email">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </p>
                                <p>Image<input type="file" class="form-control" name="image" id="image" class="image"
                                        style="margin-bottom:1rem" accept=".jpg,.gif,.png" />
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </p>
                                <p>
                                <fieldset class="form-group" style="margin-bottom:1rem">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0" name="gender" id="gender" class="gender">Gender
                                        </legend>
                                        <div class="col-sm-10">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gridRadios1" value="Male"
                                                    @if (old('gender') == 'Male')  @endif checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gridRadios2" value="Female"
                                                    @if (old('gender') == 'Female')  @endif>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gridRadios3" value="Others"
                                                    @if (old('gender') == 'Others')  @endif>
                                                <label class="form-check-label" for="gridRadios3">
                                                    Rather not disclose
                                                </label>
                                            </div>
                                            @error('gender')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                @error('name')
                                    {{ $message }}
                                @enderror
                                </p>
                                <p>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="dob" name="dob" class="dob"
                                            placeholder="YYYY/MM/DD">
                                        @error('dob')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                @error('dob')
                                    {{ $message }}
                                @enderror
                                </p>
                            </div>

                            <div class="tab">
                                <h3>Education Info</h3>
                                <p>
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
                                        <td><input type="text" id="level" name="level[]" class="form-control" class="level"
                                                placeholder="Level" aria-label="City" style="text-align: center">@error('level')
                                                {{ $message }}
                                            @enderror</td>
                                        <td><input type="text" id="college" name="college[]" class="form-control" class="college"
                                                placeholder="College" aria-label="State" style="text-align: center">@error('college')
                                                {{ $message }}
                                            @enderror</td>
                                        <td><input type="text" id="uni" name="uni[]" class="form-control" class="uni"
                                                placeholder="University/Board" aria-label="State"
                                                style="text-align: center">@error('uni')
                                                {{ $message }}
                                            @enderror</td>
                                        <td><input type="date" class="form-control" id="startdate" class="startdate"
                                                name="startdate[]">@error('startdate')
                                                {{ $message }}
                                            @enderror
                                        </td>
                                        <td><input type="date" class="form-control" id="enddate" class="enddate" name="enddate[]">@error('enddate')
                                            {{ $message }}
                                        @enderror
                                        </td>
                                        <td>
                                            <a class="btn btn-block btn-danger sa-danger remove_row "><i
                                                    class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="add-fields" >
                                    <div style="float:left;">
                                        <p class="add btn btn-warning" role="button" style="border: none; cursor:pointer"><i class="bi bi-plus"></i>
                                        </p>
                                    </div>
                                </div>
                                </p>
                            </div>




                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-primary" id="prevBtn"
                                        onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn"
                                        onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                        </form>

                        <script>
                            var currentTab = 0;
                            showTab(currentTab);

                            function showTab(n) {
                                var x = document.getElementsByClassName("tab");
                                x[n].style.display = "block";
                                if (n == 0) {
                                    document.getElementById("prevBtn").style.display = "none";
                                } else {
                                    document.getElementById("prevBtn").style.display = "inline";
                                }
                                if (n == (x.length - 1)) {
                                    document.getElementById("nextBtn").innerHTML = "Submit";
                                } else {
                                    document.getElementById("nextBtn").innerHTML = "Next";
                                }
                                fixStepIndicator(n)
                            }

                            function nextPrev(n) {
                                var x = document.getElementsByClassName("tab");
                                if (n == 1 && !validateForm()) return false;
                                x[currentTab].style.display = "none";
                                currentTab = currentTab + n;
                                if (currentTab >= x.length) {
                                    document.getElementById("regForm").submit();
                                    return false;
                                }
                                showTab(currentTab);
                            }

                            function validateForm() {
                                var x, y, i, valid = true;
                                x = document.getElementsByClassName("tab");
                                y = x[currentTab].getElementsByTagName("input");

                                name = document.getElementsByClassName("name");
                                phone = document.getElementsByClassName("phone_no");
                                address = document.getElementsByClassName("address");
                                email = document.getElementsByClassName("email");
                                image = document.getElementsByClassName("image");
                                gender = document.getElementsByClassName("gender");
                                dob = document.getElementsByClassName("dob");
                                level = document.getElementsByClassName("level");
                                college = document.getElementsByClassName("college");
                                uni = document.getElementsByClassName("uni");
                                startdate = document.getElementsByClassName("startdate");
                                enddate = document.getElementsByClassName("enddate");


                                for (i = 0; i < y.length; i++) {
                                    if (y[i].value == "") {
                                        y[i].className += " invalid";
                                        valid = false;
                                    }
                                }
                                if (valid) {
                                    document.getElementsByClassName("step")[currentTab].className += " finish";
                                }
                                return valid;
                            }

                            function fixStepIndicator(n) {
                                var i, x = document.getElementsByClassName("step");
                                for (i = 0; i < x.length; i++) {
                                    x[i].className = x[i].className.replace(" active", "");
                                }
                                x[n].className += " active";
                            }


                            $(document).ready(function() {

                                var Fields = 1;
                                var maxFields = 5;



                                $(".add").on('click', function() {
                                    if (Fields < 5) {
                                        console.log("field pressed")
                                        Fields++;
                                        $('.table tr:last').after(
                                            `<tr>
                                                <td>
                                                    <input type="text" id="level" name="level[]" class="form-control"placeholder="Level" aria-label="City" style="text-align: center">
                                                </td>
                                                <td>
                                                    <input type="text" id="college" name="college[]" class="form-control" placeholder="College" aria-label="State" style="text-align: center">
                                                </td>
                                                <td>
                                                    <input type="text" id="uni" name="uni[]" class="form-control" placeholder="University/Board" aria-label="State"style="text-align: center">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" id="startdate" name="startdate[]">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" id="enddate" name="enddate[]">
                                                </td>
                                                <td>
                                                <a class="btn btn-block btn-danger sa-danger remove_row "><i
                                                        class="bi bi-trash3"></i></a>
                                                </td>
                                            </tr>`
                                        );
                                    } else {
                                        alert("max fields reached");
                                    }

                                    console.log(Fields);
                                });

                                $(".table").on('click', '.remove_row', function() {
                                    if (Fields > 1) {
                                        $(this).closest('tr').remove();
                                        Fields--;
                                    } else {
                                        alert("There needs to be atleast one batch of education intfos!");
                                    }

                                    console.log(Fields);
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
