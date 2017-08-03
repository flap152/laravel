@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{trans('strings.biblio.documents.documents_list_title')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive" id="documentTable">
                        <th>{{trans('strings.biblio.documents.documents_id')}}</th>
                        <th>{{trans('strings.biblio.documents.documents_title')}}</th>
                        <th>{{trans('strings.biblio.documents.documents_vehicule_name')}}</th>
                        <th>{{trans('strings.biblio.documents.documents_date_document')}}</th>
                        @foreach($documents as $doc)
                            <tr>
                                <td>{{$doc->id}}</td>
                                <td>{{$doc->title}}</td>
                                <td>{{$doc->vehicule->name}}</td>
                                <td>{{$doc->document_date}}</td>
                                <input type="hidden" name="documentRow" value="/vehicule/{{$doc->vehicule_id}}/document/{{$doc->id}}"/>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection