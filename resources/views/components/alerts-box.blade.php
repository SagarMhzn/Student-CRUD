@if (session()->has('delete_success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:auto">
        {{ session('delete_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('create_success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="width:80%; margin:auto">
        {{ session('create_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if (session()->has('password_change_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; margin:auto">
        {{ session('password_change_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('profile_change_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; margin:auto">
        {{ session('profile_change_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('student_profile_update_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; margin:auto">
        {{ session('student_profile_update_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif