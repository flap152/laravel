<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}
                            <span class="caret"></span>
                        </a>

                        @include('includes.partials.lang')
                    </li>
                @endif

                @if ($logged_in_user)
                    <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')) ]) }}</li>
                @endif

                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $logged_in_user->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth
                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                            <li onclick="refreshPDFcache()"> <a> Refresh cache </a> </li>

                        </ul>
                    </li>
                @endif

                <li>{{ link_to_route('frontend.contact', trans('navs.frontend.contact'), [], ['class' => active_class(Active::checkRoute('frontend.contact')) ]) }}</li>
            </ul>
        </div><!--navbar-collapse-->
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <a href="{{url('/')}}"><img src="/img/frontend/traqclogo.png" class="center-block logo hidden-xs"/></a>
            </div>
            @if($logged_in_user)
            <div class="col-md-3 col-sm-4 col-md-push-1 col-sm-push-1">
                <img src="/img/frontend/projetdemolition.png" class="center-block logo hidden-xs"/>
            </div>
            @endif
        </div>
    </div><!--container-->
</nav>
<script>
    function refreshPDFcachea() {
        console.info('Refreshing document cache');
        var base_url = window.location.origin;
        const url = base_url+'/api/cacheddocs';
        const docum = 66;
                        console.log('we should load document id:'+docum);
                        fetchAndLog( base_url + '/pj/'+docum);
                        //fetchAndLog( base_url +'/documents/'+docum);


    }
    function refreshPDFcache() {
        console.info('Refreshing document cache');
        var base_url = window.location.origin;
        fetchAndLog( base_url +'/css/frontend.css');
        fetchAndLog( base_url +'/css/myFrontend.css');
        fetchAndLog( base_url +'/myapp.js');
        fetchAndLog( base_url +'/img/frontend/traqclogo.png');
        fetchAndLog( base_url +'/img/frontend/projetdemolition.png');
        fetchAndLog( base_url +'/');
        fetchAndLog( base_url +'/vehicules');
        fetchAndLog( base_url +'/documents');

        const url = base_url+'/api/cacheddocs';
        fetch(url)
            .then((resp) => resp.json())
            .then(function(data) {
                let documentlist = data.results;
                documentlist.forEach(function(document) {
                        console.log('we should load document id:'+document);

                        fetchAndLog( base_url + '/pj/'+document);
                        fetchAndLog( base_url +'/documents/'+document);

                    }
                );
                return "ww";
            })
            .catch(function(error) {
                console.log(JSON.stringify(error));
            });

    }

</script>