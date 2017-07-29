@extends('layouts.master')

@section('content')
    @if(!$users->count())
        <p>No users found</p>
    @else
        <div class="row">
            <div class="col-lg-12">
                @foreach($users as $user)
                    @include('partials.user')
                @endforeach
            </div>
        </div>
    @endif
@endsection