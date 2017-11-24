@extends('frontend.layouts.app')

@section('content')
<div  class="card">
    <div class="card-header title h1">
        {{$title}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="row">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection