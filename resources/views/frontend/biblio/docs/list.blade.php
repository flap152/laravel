@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{trans('strings.biblio.documents.list_title')}} <i class="fa fa-file-pdf-o"></i></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive" id="documentTable">
                        @debug
                            <th>{{trans('strings.biblio.documents.id')}}</th>
                        @endif
                        <th>{{trans('strings.biblio.documents.title')}}</th>
                        <th>{{trans('strings.biblio.vehicules.name')}}</th>
                        <th>{{trans('strings.biblio.documents.document_date')}}</th>
                        <th>{{trans('strings.biblio.link')}}</th>
                        @foreach($documents as $doc)
                            <tr>
                                @debug
                                    <td>{{$doc->id}}</td>
                                @endif
                                <td>{{$doc->title}}</td>
                                <td>{{$doc->vehicule->name}}</td>
                                <td>{{$doc->document_date}}</td>
                                <td><a href="/documents/{{$doc->id}}">{{trans('strings.biblio.link')}}</a></td>
                                <input type="hidden" name="documentRow" value="/documents/{{$doc->id}}"/>
                            </tr>
                        @endforeach
                    </table>
                    {{$documents->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection