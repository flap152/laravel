@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{trans('strings.biblio.documents.list_title')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive" id="documentTable">
                        <tr>
                            @debug
                                <th>{{trans('strings.biblio.documents.id')}}</th>
                            @endif
                            <th>{{trans('strings.biblio.documents.title')}}</th>
                            <th>{{trans('strings.biblio.vehicules.name')}}</th>
                            <th>{{trans('strings.biblio.documents.document_date')}}</th>
                            <th>{{trans('strings.biblio.documents.attachment')}}</th>
                        </tr>
                        <tr>
                            @debug
                                <td>{{$document->id}}</td>
                            @endif
                            <td>{{$document->title}}</td>
                            <td>{{$document->vehicule->name}}</td>
                            <td>{{$document->document_date}}</td>
                            <td><a href="{{$document->getUrl()}}">{{trans('strings.biblio.documents.attachment')}}</a></td>
                            <input type="hidden" name="documentRow" value="{{$document->getUrL()}}"/>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection