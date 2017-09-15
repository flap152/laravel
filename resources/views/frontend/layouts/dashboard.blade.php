@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{trans('navs.frontend.dashboard')}}</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-push-8 col-sm-4 col-sm-push-8">
                            <ul class="media-list">
                                <li class="media">
                                    <!--<div class="media-left">
                                        <img class="media-object profile-picture" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                                    </div>-->
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                {{trans('strings.frontend.user.last_logged_in')}}&nbsp;{{\Carbon\Carbon::now()}}
                                            </small>
                                        </h4>
                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                        {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div>
                                </li>
                            </ul>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Dashboard</h4>
                                </div><!--panel-heading-->
                                <div class="panel-body">
                                    <canvas id="chart" width="500" height="250"></canvas>
                                    À venir
                                </div><!--panel-body-->
                            </div><!--panel-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Item à venir</h4>
                                </div><!--panel-heading-->
                                <div class="panel-body">
                                    À venir
                                </div><!--panel-body-->
                            </div><!--panel-->
                        </div>
                        <div class="col-md-8 col-md-pull-4 col-sm-8 col-sm-pull-4">
                            <div class="row">
                                @foreach($moduletile as $module)
                                    <div class="col-lg-6 col-sm-6">
                                        @include('frontend.tile', ['tile_title' => $module->title, 'lien' => $module->link, 'icon' => $module->icon, 'texte' => $module->description])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
<script>
    $(document).ready(function(){
        var ctx = document.getElementById('chart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["L", 'Ma', 'Me', 'J', 'V', 'S', 'D'],
                datasets: [{
                    label: '# of documents',
                    data: [1,5,10,10,4,8,19,2],
                    backgroundColor: "#0085A1"
                }]
            }
        });
    });
</script>
@endsection