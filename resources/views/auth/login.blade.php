@extends('navbar.adminnav')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="" style="margin-top: 20%">
                <img class="d-block mx-auto w-25" src="{{asset('logo/logo.png')}}" alt="">


                    <form method="POST" class="mt-5" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-6 mx-auto">
                                <input id="email" placeholder="enter email address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6 mx-auto">
                                <input id="password" placeholder="enter password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-6 mx-auto">
                                <button type="submit" class="btn btn-outline-primary w-50 d-block mx-auto">
                                    {{ __('Login') }}
                                </button>

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
