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
    <!--script src="/myapp.js"></script FFLLAAPP maybe it shoud be here   -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        // PWA service worker support - taken from https://justmegareth.com/2017-07-15-progressive-web-app-in-laravel/
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                //navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                //FFLLAAPP migrating to workbox
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
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


    <div id="id01"></div>
    <script>
        var xmlhttp = new XMLHttpRequest();
        var url2 = "api/cacheddocs";

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('1st call'+this.responseText);
                var myArr = JSON.parse(this.responseText);
                myFunction(myArr);
            }
        };
        xmlhttp.open("GET", url2, true);
        xmlhttp.send();

        function myFunction(arr) {
            var out = "";
            var i;
            for(i = 0; i < arr.length; i++) {
                out += arr[i] + '<br>';
            }
            document.getElementById("id01").innerHTML = out;
        }
    </script>
    <script>
        const fetchAndLog = async (url) => {
            console.log('info', `Requesting ${url}...`);
            try {
                const response = await fetch(url);
                const text = await response.text();
                console.log('info', `...the response for ${url} is :` + text.substr(0,125) );
            } catch(error) {
                console.log(`...fetch failed due to '${error}'.`);
            }
        };

        document.addEventListener("DOMContentLoaded", function(event) {
            //do work

        //This gets the list of documents to cache, and caches it...
        //const url = 'https://randomuser.me/api/?results=10';
        const url = 'https://laravel.dev/api/cacheddocs';
        fetch(url2)
            .then((resp) => resp.json())
            .then(function(data) {
                let documentlist = data.results;
                documentlist.forEach(function(document) {
                        console.log('we should load document id:'+document);

                        fetchAndLog('https://flapdev1.ngrok.io/pj/'+document);
                        fetchAndLog('https://flapdev1.ngrok.io/documents/'+document);

                    }
                );
                return "ww";
            })
            .catch(function(error) {
                console.log(JSON.stringify(error));
            });

        });
    </script>
</head>
<body id="app-layout">
<div id="app">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.nav')
    <div class="container">
        @include('includes.partials.messages')
        @ include  ('includes.partials.swh')
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