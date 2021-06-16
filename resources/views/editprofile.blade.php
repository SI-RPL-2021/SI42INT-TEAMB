@extends('navbar.adminnav')
@section('content')

    <div class="container">
        <h3 class="mt-3">Edit User</h3>
        <form  action="/editprofs" class="form-group mt-3" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <p class="mt-3">Name</p>
            <input type="text" placeholder="Person Names" class="form-control mt-3" disabled value="{{Auth::user()->name}}" name="name" required>
            <p class="mt-3">username</p>
            <input type="text" id="username" placeholder="Username" class="form-control @error('email') is-invalid @enderror mt-3" name="username" value="{{Auth::user()->username}}" required>
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <p class="mt-3">Old Password</p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-3" placeholder="Wajib diisi untuk verifikasi" name="password" required autocomplete="new-password">


            <p class="mt-3">New Password</p>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-3" placeholder="Jangan Diisi Jika Tidak Memperbarui Password" name="npassword" autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <p class="mt-3">Role</p>
            <input id="" name="role" type="text" disabled class="form-control mt-3" placeholder="confirm password" value="{{Auth::user()->role}}" >

            <button type="submit" class="btn btn-success mt-3 d-block mx-auto w-100">Save And Changes</button>
        </form>
    </div>
@endsection

@push('script')
    @if(session('error'))
        <script>
            swal("perhatian!", "password salah", "error");
        </script>
        @endif
@endpush


