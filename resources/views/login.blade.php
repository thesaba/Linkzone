@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{!! route('postLogin') !!}">
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{!! Request::old('email') !!}" required>

                    @if($errors->has('email'))
                        <span class="help-block">{!! $errors->first('email') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>

                    @if($errors->has('password'))
                        <span class="help-block">{!! $errors->first('password') !!}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="remember_me" id="remember_me"> Remember me</label>
                </div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection