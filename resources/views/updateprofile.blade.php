@extends('template')

@section('title', 'Profile')

@section('content')

    @if ($errors->any())
        {{-- Error msg --}}
        <div class="alert alert-dismissible alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Profile Page HTML --}}
    <div class="profile">
        <div class="profile-display">
            <div class="my-profile">
                <h1 id="my">My&nbsp;</h1>
                <h1 id="profile">Profile</h1>
            </div>
            <div class="user-name">
                {{ Auth::user()->name }}
                {{-- Name --}}
            </div>
            <div class="user-email">
                {{ Auth::user()->email }}
                {{-- blablabla@gmail.com --}}
            </div>
        </div>

        <div class="update-profile">
            <h1 id="update-profile">Update Profile</h1>
            <form action="/profile/saveChanges" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Username</span>
                        <input name="username" type="username" class="form-control" value="{{ Auth::user()->name }}"  autocomplete="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Email</span>
                        <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}"  autocomplete="Email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">DOB</span>
                        <input name="dob" type="date" class="form-control" value="{{ Auth::user()->dob }}"  autocomplete="DOB">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Phone</span>
                        <input name="phone" type="phone" class="form-control" value="{{ Auth::user()->phone }}"  autocomplete="Phone">
                    </div>
                    <div class="input-group mb-3">
                        <label for="max-expenses" class="form-label">Max Expenses : Rp. <span id="formatted-value"></span></label>
                        <input name="max_expenses" type="range" class="form-range" name="max-expenses" id="max-expenses" min="5000000" max="30000000" step="500000" value="5000000">
                    </div>
                    <button class="btn btn-primary save-changes">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var input = document.getElementById("max-expenses");
        var output = document.getElementById("formatted-value");
        input.addEventListener("input", function() {
            var value = input.value;
            var formattedValue = new Intl.NumberFormat().format(value);
            output.innerHTML = formattedValue;
        });
    </script>

@endsection
