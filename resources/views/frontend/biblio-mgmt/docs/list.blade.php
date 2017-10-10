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
                                    {{trans('strings.biblio_mgmt.docs.ID')}}
                                @endif
                            </th>
                            <th>
                                {{trans('strings.biblio_mgmt.docs.title')}}
                            </th>
                            <th>
                                {{trans('strings.biblio_mgmt.docs.vehicle_name')}}
                            </th>
                            <th>
                                {{trans('strings.biblio_mgmt.docs.document_date')}}
                            </th>
                            <th>
                                {{trans('strings.biblio_mgmt.docs.is_doc_valid')}}
                            </th>
                            <th>
                                {{trans('labels.general.actions')}}
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
                                <td>
                                    Actions
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection