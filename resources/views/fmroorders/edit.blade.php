@extends('app')

@section('content')
    @include('fmroorders.toppart')
    <h1>FLAP Edit {{ $fmroorder->name }}</h1>

    @include('errors.list')
    {!! Form::model($fmroorder,['method' => 'PATCH', 'action' => ['FmroorderController@update', $fmroorder->id]])  !!}
         @include ('fmroorders.form',['submitButtonText' => 'Edit the Order!'])
    {{ Form::close() }}

@stop