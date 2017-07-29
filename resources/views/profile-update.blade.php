@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{!! route('postUpdateProfile') !!}">
                <div class="form-group {!! $errors->has('fname') ? 'has-error' : '' !!}">
                    <label for="fname" class="control-label">First name</label>
                    <input type="text" name="fname" class="form-control" id="fname" autocomplete="off" value="{!! Auth::user()->fname !!}" required>

                    @if($errors->has('fname'))
                        <span class="help-block">{!! $errors->first('fname') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('lname') ? 'has-error' : '' !!}">
                    <label for="lname" class="control-label">Last name</label>
                    <input type="text" name="lname" class="form-control" id="lname" autocomplete="off" value="{!! Auth::user()->lname !!}" required>

                    @if($errors->has('lname'))
                        <span class="help-block">{!! $errors->first('lname') !!}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{!! Auth::user()->email !!}" disabled required>
                </div>
                <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
                    <label for="username" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" autocomplete="off" value="{!! Auth::user()->username !!}" required>

                    @if($errors->has('username'))
                        <span class="help-block">{!! $errors->first('username') !!}</span>
                    @endif
                </div>

                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update Profile</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{!! route('postUpdatePassword') !!}">
                <div class="form-group  {!! $errors->has('password') ? 'has-error' : '' !!}">
                    <label for="password" class="control-label">New Password</label>
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
                    <button type="submit" class="btn btn-default">Update Password</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6" style="margin-top: 20px;">
            <form class="form-vertical" role="form" method="post" action="{!! route('postUpdateProfilePicture') !!}" enctype="multipart/form-data">
                <div class="form-group  {!! $errors->has('profile_picture') ? 'has-error' : '' !!}">
                    <label for="profile_picture" class="control-label">Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control" id="profile_picture" required>

                    @if($errors->has('profile_picture'))
                        <span class="help-block">{!! $errors->first('profile_picture') !!}</span>
                    @endif
                </div>

                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update Profile Picture</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6" style="margin-top: 20px;">
            <form class="form-vertical" role="form" method="post" action="{!! route('postUpdateProfileCover') !!}" enctype="multipart/form-data">
                <div class="form-group  {!! $errors->has('cover_picture') ? 'has-error' : '' !!}">
                    <label for="cover_picture" class="control-label">Cover Picture</label>
                    <input type="file" name="cover_picture" class="form-control" id="cover_picture" required>

                    @if($errors->has('cover_picture'))
                        <span class="help-block">{!! $errors->first('cover_picture') !!}</span>
                    @endif
                </div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update Cover Picture</button>
                </div>
            </form>
        </div>
    </div>
@endsection