@extends('app')

@section('content')
<h1> {{ $company->name }} </h1>



	<company>
		<h2>
			 {{$company->name}} 
		</h2>
		<div class="body">{{$company->email}}</div>
	</company>
@stop