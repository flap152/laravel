@extends('app')

@section('content')


    <h1>FLAP Create Order </h1>

    @include('errors/list')
    {!! Form::open(['url' => 'fmroorders'])  !!}
        @include ('fmroorders.form',['submitButtonText' => 'Create the Order!'])
    {{ Form::close() }}

@stop