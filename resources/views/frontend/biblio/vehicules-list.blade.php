@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{trans('strings.biblio.vehicules.list_title')}} <i class="fa fa-truck"></i></h3>
                </div>
                <div class="panel-body">
                    <table class="table-responsive table-condensed" id="vehiculeTable">
                        <tr>
                            @debug
                            <th style="width: 85px;">{{trans('strings.biblio.vehicules.id')}}</th>
                            @endif
                            <th>{{trans('strings.biblio.vehicules.name')}}</th>
                        </tr>
                        @foreach($vehicules as $vehicule)
                            <tr>
                                @debug
                                <td style="width: 85px;">{{$vehicule->id}}</td>
                                @endif
                                <td>{{$vehicule->name}}</td>
                                <input type="hidden" name="documentRow" value="vehicules/{{$vehicule->id}}/documents"/>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection