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
                        <tr>
                            <th>{{trans('strings.biblio.documents.documents_id')}}</th>
                            <th>{{trans('strings.biblio.documents.documents_title')}}</th>
                            <th>{{trans('strings.biblio.vehicules.vehicules_name')}}</th>
                            <th>{{trans('strings.biblio.documents.documents_date_document')}}</th>
                            <th>{{trans('strings.biblio.documents.documents_attachment')}}</th>
                        </tr>
                        <tr>
                            <td>{{$document->id}}</td>
                            <td>{{$document->title}}</td>
                            <td>{{$document->vehicule->name}}</td>
                            <td>{{$document->document_date}}</td>
                            <!--TODO: Rediriger plus robuste vers la pièce jointe-->
                            <td><a href="{{$document->getUrl()}}">{{trans('strings.biblio.documents.documents_attachment')}}</a></td>
                            <input type="hidden" name="documentRow" value="{{$document->getUrl()}}"/>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection