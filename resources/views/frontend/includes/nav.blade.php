<?php
$showBeta = 1;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

@if(false)

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
@endif
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</a>

                    @include('includes.partials.lang')
                </li>
            @endif

            @auth
                <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">{{ __('navs.frontend.dashboard') }}</a></li>
            @endauth

            @if(!auth())
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">{{ __('navs.frontend.login') }}</a></li>

                @if (config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">{{ __('navs.frontend.register') }}</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('navs.frontend.user.administration') }}</a>
                        @endcan

                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">{{ __('navs.frontend.user.account') }}</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">{{ __('navs.general.logout') }}</a>
                    </div>
                </li>
            @endif

            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">{{ __('navs.frontend.contact') }}</a></li>
        </ul>

    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <a href="{{url('/')}}"><img src="/img/frontend/traqclogo.png" class="center-block logo hidden-xs"/></a>
                </div>
                @if($logged_in_user)
                    <div class="col-md-4 col-sm-4">
                        <img src="/img/frontend/projetdemolition.png" class="center-block logo hidden-xs"/>
                    </div>
                @endif
                @if($showBeta)
                    <div class="col-md-4 col-sm-4">
                        <div id="beta">
                            <img src="/img/frontend/beta.png" class="center-block"/>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>


