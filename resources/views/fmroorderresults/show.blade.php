@extends('app')

@section('content')
    <?php
    //xdebug_break();
    ?>
    <h1>Showing {{ $fmroorderresult->OrderNumber }}</h1>

    @include('errors.list')
    {!! Form::model($fmroorderresult,['method' => 'GET', 'action' => ['FmroorderresultController@index']])  !!}
    @include ('fmroorderresults.form',['submitButtonText' => 'Return to list'])
    {{ Form::close() }}
<script>
    $(function() {
        $(':input.form-control').prop('disabled', true);

    });
</script>

@stop