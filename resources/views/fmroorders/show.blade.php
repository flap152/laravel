@extends('app')

@section('content')
    <h1>Showing {{ $fmroorder->name }}</h1>

    @include('errors.list')
    {!! Form::model($fmroorder,['method' => 'GET', 'action' => ['FmroorderController@index']])  !!}
    @include ('fmroorders.form',['submitButtonText' => 'Return to list'])
    {{ Form::close() }}
<script>
    $(function() {
        $(':input.form-control').prop('disabled', true);

    });
</script>

@stop