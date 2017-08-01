@extends('frontend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Vehicules</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed" id="vehiculeTable">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nom Vehicule</th>
                            <th class="text-center">Nombre Document</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        @foreach($vehicules as $vehicule)
                            <tr>
                                <td class="text-center">{{$vehicule->id}}</td>
                                <td class="text-center">{{$vehicule->name}}</td>
                                <td class="text-center">{{$vehicule->documents->count()}}</td>
                                <td class="text-center"><a href="/vehicules/{{$vehicule}}/documents">Lien vers document</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection