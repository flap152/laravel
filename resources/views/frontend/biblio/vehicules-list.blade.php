@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Véhicules</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed" id="vehiculeTable">
                        <tr>
                            <th style="width: 31px;">ID</th>
                            <th>Nom Véhicule</th>
                        </tr>
                        @foreach($vehicules as $vehicule)
                        <tr>
                            <td style="width: 31px;">{{$vehicule->id}}</td>
                            <td>{{$vehicule->name}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection