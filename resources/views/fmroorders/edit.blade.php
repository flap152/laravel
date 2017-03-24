@extends('app')

@section('content')

    <h1>Edit order {{ $fmroorder->name }}</h1>

    @include('errors.list')
    {!! Form::model($fmroorder,['method' => 'PATCH', 'action' => ['FmroorderController@update', $fmroorder->id]])  !!}
         @include ('fmroorders.form',['submitButtonText' => 'Save Order'])
    {{ Form::close() }}

@stop