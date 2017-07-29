@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <img src="{!! $user->getCoverPicture($user) !!}" width="100%" height="130">
            @include('partials.user')
            <hr />
        </div>
    </div>
@endsection

