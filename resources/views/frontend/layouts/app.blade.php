<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
@yield('meta')

<!-- Styles -->
@yield('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    @langRTL
{{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
@else
    {{ Html::style(mix('css/frontend.css')) }}
@endif

@yield('after-styles')
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        // PWA service worker support - taken from https://justmegareth.com/2017-07-15-progressive-web-app-in-laravel/
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
</head>
<body id="app-layout">
<div id="app">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.nav')
    <div class="container">
        @include('includes.partials.messages')
        @yield('content')
        <footer class="fixed-bottom">
            <a href="http://"></a>
        </footer>
    </div><!--container-->
</div><!--app-->
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
@yield('before-scripts')
{!! Html::script(mix('js/frontend.js')) !!}
{!! Html::script('/js/biblio/script.js') !!}
@yield('after-scripts')
@include('includes.partials.ga')
</body>
</html>