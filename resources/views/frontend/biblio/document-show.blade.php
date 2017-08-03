@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Documents</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive" id="documentTable">
                        <th>ID</th>
                        <th>Titre</th>
                        <th>ID Véhicule</th>
                        <th>Nom Véhicule</th>
                        <th>Date Document</th>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{$document->id}}</td>
                                <td>{{$document->title}}</td>
                                <td>{{$document->vehicule_id}}</td>
                                <td>{{$document->vehicule->name}}</td>
                                <td>{{$document->document_date}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection