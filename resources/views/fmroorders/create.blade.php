@extends('app')

@section('content')
    @include('fmroorders.toppart')

    <h1>FLAP Create Order </h1>

    @include('errors/list')
    {!! Form::open(['url' => 'fmroorders'])  !!}
        @include ('fmroorders.form',['submitButtonText' => 'Create the Order!'])
    {{ Form::close() }}

@stop