@extends('navbar.adminnav')

@section('content')
    <div class="container">
        <h3 class="mt-3">New User</h3>
        <form  action="/admin/users/usersadd" class="form-group mt-3" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="text" placeholder="Person Names" class="form-control mt-3" name="name" required>
            <input type="text" id="username" placeholder="Username" class="form-control @error('email') is-invalid @enderror mt-3" name="username" value="{{old('username')}}" required>
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-3" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-3" placeholder="password" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                                    </span>
            @enderror


            <input id="password-confirm" type="password" class="form-control mt-3" placeholder="confirm password" name="password_confirmation" required autocomplete="new-password">

            <select class="custom-select mt-3" id="inputGroupSelect01" name="role">
                <option selected>Role..</option>
                <option value="cashier">Cashier</option>
                <option value="storage">Stafff Gudang</option>
            </select>
            <button class="btn btn-success mt-3 d-block mx-auto w-100" type="submit">Create New User</button>

        </form>
    </div>

@endsection

{{--@push('script')--}}
{{--    <script>--}}
{{--        document.querySelector('.custom-file-input').addEventListener('change',function(e){--}}
{{--            var fileName = document.getElementById("inputGroupFile01").files[0].name;--}}
{{--            var nextSibling = e.target.nextElementSibling--}}
{{--            nextSibling.innerText = fileName--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
