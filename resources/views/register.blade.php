@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{!! route('postRegister') !!}">
                <div class="form-group {!! $errors->has('fname') ? 'has-error' : '' !!}">
                    <label for="fname" class="control-label">First name</label>
                    <input type="text" name="fname" class="form-control" id="fname" autocomplete="off" value="{!! Request::old('fname') !!}" required>

                    @if($errors->has('fname'))
                        <span class="help-block">{!! $errors->first('fname') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('lname') ? 'has-error' : '' !!}">
                    <label for="lname" class="control-label">Last name</label>
                    <input type="text" name="lname" class="form-control" id="lname" autocomplete="off" value="{!! Request::old('lname') !!}" required>

                    @if($errors->has('lname'))
                        <span class="help-block">{!! $errors->first('lname') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{!! Request::old('email') !!}" required>

                    @if($errors->has('email'))
                        <span class="help-block">{!! $errors->first('email') !!}</span>
                    @endif
                </div>
                <div class="form-group  {!! $errors->has('password') ? 'has-error' : '' !!}">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>

                    @if($errors->has('password'))
                        <span class="help-block">{!! $errors->first('password') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('confirm_password') ? 'has-error' : '' !!}">
                    <label for="confirm_password" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" autocomplete="off" required>

                    @if($errors->has('confirm_password'))
                        <span class="help-block">{!! $errors->first('confirm_password') !!}</span>
                    @endif
                </div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign up</button>
                </div>
            </form>
        </div>
    </div>
@endsection