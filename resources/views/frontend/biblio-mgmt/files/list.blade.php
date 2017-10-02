@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>PDFS <i class="fa fa-file-pdf-o"></i></h3>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection