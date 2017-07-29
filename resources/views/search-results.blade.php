@extends('layouts.master')

@section('content')
    <h3>Your search for "{!! Request::get('query') !!}"</h3>
    @if(!$users->count())
        <p>No results found</p>
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