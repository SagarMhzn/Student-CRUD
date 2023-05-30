@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

                            .error {
                                color: #f44336;
                            }

                            #img-preview {
                                display: none;
                                width: 155px;
                                border: 2px;
                                margin-bottom: 20px;
                            }

                            #img-preview img {
                                width: 100%;
                                height: auto;
                                display: block;
                            }

                            /* [type="file"] {
                                                                    height: 0;
                                                                    width: 0;
                                                                    overflow: hidden;
                                                                } */

                            [type="file"]+label {
                                font-family: sans-serif;
                                background: #f44336;
                                padding: 10px 30px;
                                border: 2px solid #f44336;
                                border-radius: 3px;
                                color: #fff;
                                cursor: pointer;
                                transition: all 0.2s;
                            }

                            [type="file"]+label:hover {
                                background-color: #fff;
                                color: #f44336;
                            }
                        </style>
                        <form id="regForm" action="{{ route('student.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                @foreach ($errors->all() as $errors)
                                    <h1 class="text-danger">{{ $errors }}</h1>
                                @endforeach
                            @endif

                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <h3>Student Details</h3>
                                <p>Name<input placeholder="Name" onchange="this.className = ''" name="name" value="{{ old('name') }}"
                                        type="text" class="name"></p>
                                <span id="name" class="error"></span>
                                <p>Phone No.<input placeholder="Phone No." oninput="this.className = ''" name="phone_no" value="{{ old('phone_no') }}"
                                        class="phone_no" type="text"></p>
                                <span id="phone_no" class="error"></span>
                                <p>Address<input placeholder="Address" oninput="this.className = ''" name="address" value="{{ old('address') }}"
                                        type="text" class="address"></p>
                                <span id="address" class="error"></span>
                                <p>E-mail<input placeholder="E-mail" oninput="this.className = ''" name="email" value="{{ old('email') }}"
                                        type="email" class="email"></p>
                                <span id="email" class="error"></span>
                                <p>Image
                                    {{-- <input type="file" class="form-control" name="image" id="image"
                                        class="image" style="margin-bottom:1rem" accept=".jpg,.gif,.png" />
                                    @error('image')
                                        {{ $message }}
                                    @enderror --}}


                                <div>
                                    <div id="img-preview"></div>
                                    <input type="file" class="form-control" id="choose-file" name="image"
                                        style="margin-bottom:1rem; object-fit: cover;" accept="image/*" />
                                </div>
                                </p>
                                <p>
                                <fieldset class="form-group" style="margin-bottom:1rem">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0" name="gender" class="gender" value="{{ old('gender') }}">Gender
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

                                            <span id="name" class="error"></span>
                                        </div>
                                    </div>
                                </fieldset>

                                </p>
                                <p>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label" value="{{ old('dob') }}">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dob" class="dob"
                                            placeholder="YYYY/MM/DD">
                                    </div>
                                </div>
                                </p>
                                <span id="dob" class="error"></span>



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
                                        <td><input type="text" name="level[]" class="form-control" class="level"
                                                placeholder="Level" aria-label="City" style="text-align: center">
                                        </td>

                                        <td><input type="text" name="college[]" class="form-control" class="college"
                                                placeholder="College" aria-label="State" style="text-align: center">
                                        </td>

                                        <td><input type="text" name="uni[]" class="form-control" class="uni"
                                                placeholder="University/Board" aria-label="State"
                                                style="text-align: center">
                                        </td>

                                        <td><input type="date" class="form-control" class="startdate"
                                                name="startdate[]">
                                        </td>

                                        <td><input type="date" class="form-control" class="enddate" name="enddate[]">
                                        </td>

                                        <td>
                                            <a class="btn btn-block btn-danger sa-danger remove_row "><i
                                                    class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span id="level[]" class="error"></span></td>
                                        <td><span id="college[]" class="error"></span></td>
                                        <td><span id="uni[]" class="error"></span></td>
                                        <td><span id="startdate[]" class="error"></span></td>
                                        <td><span id="enddate[]" class="error"></span></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="add-fields">
                                    <div style="float:left;">
                                        <p class="add btn btn-warning" role="button"
                                            style="border: none; cursor:pointer"><i class="bi bi-plus"></i>
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

                                var errorElements = document.getElementsByClassName("error");
                                for (i = 0; i < errorElements.length; i++) {
                                    errorElements[i].innerHTML = "";
                                }


                                for (i = 0; i < y.length; i++) {

                                    var elementId = y[i].getAttribute("id");

                                    var val = y[i].value.trim();
                                    var fieldName = y[i].name;

                                    if (val === "" && elementId != 'choose-file') {
                                        y[i].className += " invalid";
                                        valid = false;
                                        document.getElementById(fieldName).innerHTML = "This field is required.";
                                    } else {
                                        // Additional checks for specific fields
                                        if (fieldName === "name" && !/^[a-zA-Z\s]+$/.test(val)) {
                                            y[i].className += " invalid";
                                            valid = false;
                                            document.getElementById("name").innerHTML =
                                                "Please enter a valid name (only text characters are allowed).";
                                        } else if (fieldName === "name" && val.length > 20) {
                                            y[i].className += " invalid";
                                            valid = false;
                                            document.getElementById("name").innerHTML =
                                                "Please enter a valid name (Name should be no greater than 20 characters!).";

                                        } else if (fieldName === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
                                            y[i].className += " invalid";
                                            valid = false;
                                            document.getElementById("email").innerHTML = "Please enter a valid email address.";
                                        } else if (fieldName === "phone_no" && !/^[0-9]{10}$/.test(val) && val.length > 10) {
                                            y[i].className += " invalid";
                                            valid = false;
                                            document.getElementById("phone_no").innerHTML = "Please enter a valid phone number.";
                                        }


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
                                        alert("There needs to be atleast one batch of education infos!");
                                    }

                                    console.log(Fields);
                                });


                            });


                            const chooseFile = document.getElementById("choose-file");
                            const imgPreview = document.getElementById("img-preview");

                            chooseFile.addEventListener("change", function() {
                                getImgData();
                            });

                            function getImgData() {
                                const files = chooseFile.files[0];
                                if (files) {
                                    const fileReader = new FileReader();
                                    fileReader.readAsDataURL(files);
                                    fileReader.addEventListener("load", function() {
                                        imgPreview.style.display = "block";
                                        imgPreview.innerHTML = '<div><img src="' + this.result + '" />';
                                    });
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
