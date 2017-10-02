@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Biblio - Gestion des documents <i class="fa fa-file-pdf-o"></i></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <tr>
                            <th>
                                @debug
                                    {{trans('strings.biblio.documents.id')}}
                                @endif
                            </th>
                            <th>
                                {{trans('strings.biblio.documents.title')}}
                            </th>
                            <th>
                                {{trans('strings.biblio.vehicules.name')}}
                            </th>
                            <th>
                                {{trans('strings.biblio.documents.document_date')}}
                            </th>
                            <th>
                                {{trans('strings.biblio.documents.doc_valid')}}
                            </th>
                        </tr>
                        @foreach($docs as $doc)
                            <tr>
                                <td>
                                    @debug
                                        {{$doc->id}}
                                    @endif
                                </td>
                                <td>
                                    {{$doc->title}}
                                </td>
                                <td>
                                    {{$doc->vehicule->name}}
                                </td>
                                <td>
                                    {{$doc->document_date}}
                                </td>
                                <td>
                                    @if($doc->is_doc_valid == 0)
                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                    @elseif($doc->is_doc_valid == 1)
                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                    @elseif($doc->is_doc_valid != 0 && $doc->is_doc_valid != 1)
                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection