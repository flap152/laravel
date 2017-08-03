@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{trans('strings.biblio.vehicules.vehicules_list_title')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed" id="vehiculeTable">
                        <tr>
                            <th style="width: 85px;">{{trans('strings.biblio.vehicules.vehicules_id')}}</th>
                            <th>{{trans('strings.biblio.vehicules.vehicules_name')}}</th>
                        </tr>
                        @foreach($vehicules as $vehicule)
                            <tr>
                                <td style="width: 85px;">{{$vehicule->id}}</td>
                                <td>{{$vehicule->name}}</td>
                                <input type="hidden" name="documentRow" value="/vehicule/{{$vehicule->id}}/documents"/>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection