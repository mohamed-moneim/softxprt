@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body text-center">
                <form method="post" action="{{ route('login') }}">
                <span class="text-danger text-left">{{ $errors->first('unauthorised') }}</span>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="col-lg-4"  src="{!! url('dist/img/login.png') !!}" alt="">
        


        <div class="form-group form-floating mb-3">
        <label for="floatingName">Email or Username</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
        <label for="floatingPassword">Password</label>

        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
