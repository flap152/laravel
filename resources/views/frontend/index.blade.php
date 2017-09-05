@extends('frontend.layouts.app')

@section('content')
    @if(auth()->check() === false)
        @if(isset($message))
            <h4 class="text-center">{{$message}}</h4>
        @endif
        @include('frontend.auth.login', ['socialite_links' => $socialite_links])
    @endif
@endsection