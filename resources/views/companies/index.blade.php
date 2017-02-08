@extends('app')

@section('content')
    <?php xdebug_break(); ?>
<h1> Company!! </h1>


@foreach ($companies as $company)
	<company>
		<h2>
			<a href="{{ url('/companies', $company->id) }}"> {{$company->name}} </a>
		</h2>
		<div class="body">{{$company->email}}</div>
	</company>
	@endforeach
@stop