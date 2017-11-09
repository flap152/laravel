@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header">
                    <h4>{{trans('navs.frontend.dashboard')}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-lg-push-8">
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
                                        @can('view backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endcan
                                    </div>
                                </li>
                            </ul>
                            <div class="card card-default">
                                <div class="panel-heading">
                                    <h4>Dashboard</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <canvas id="chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!--panel-->
                        </div>
                        <div class="col-lg-8 col-lg-pull-4">
                            <div class="row">
                                @foreach($moduleTile as $module)
                                    <div class="col-lg-4 col-padding">
                                        @include('frontend.tile',['module' => $module])
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

            //var data = {!! json_encode(array_values($docs)) !!};
            var labels = {!! json_encode($keys) !!};

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of documents',
                        data: [1,5,4,8,7,3,2],
                        backgroundColor: "#0085A1"
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection