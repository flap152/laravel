@extends('frontend.layouts.app')

@section('content')
<div  class="card">
    <div class="card-header">
        {{$title}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-lg-pull-4">
                <div class="row">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection