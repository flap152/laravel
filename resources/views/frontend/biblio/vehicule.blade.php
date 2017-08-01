@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Vehicules</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Number document</th>
                        </tr>
                        @foreach($vehicules as $vehicule)
                            <tr data-href="/vehicules/{{$vehicule->id}}/documents">
                                <td class="text-center">{{$vehicule->id}}</td>
                                <td class="text-center">{{$vehicule->name}}</td>
                                <td class="text-center">{{$vehicule->documents->count()}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection