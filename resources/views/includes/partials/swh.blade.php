    @if(1==2)
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <div class="flex-center position-ref full-height">

                <img id="httpbinimage" src="img/b1.jpg" height="300" width="300" />
                <embed id="pdffile"  type="application/pdf" width="300px" height="700px" />

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <p>You can see the effect of the service worker by trying out the following:</p>

                <p>
                    <button id="precached">Request precached.txt</button> to see how precached
                    assets are served.
                </p>

                <p>
                    <button id="hello">Request hello.txt</button> to see a RegExp route in action.
                </p>

                <p>
                    <button id="notmatched">Request not-matched.dat</button> to demonstrate that
                    requests which aren't matched by a route default to going against the network.
                </p>

                <p>
                    <button id="delay">Request a Delayed Response</button> to see how a
                    network-first strategey can have a maximum timeout, after which a previously
                    cached response is used.
                </p>

                <p>
                    <button id="image">Request an Image</button> demonstrates cache expiration by
                    fetching one of three sequential images, when the maximum cache size is two.
                    <br>

                </p>
                <div>

                <!--embed id="pdffile" src="/pdfs/b1.pdf" width="300px" height="700px" /-->

                </div>
            </div>
        </div>

        @endif

        <script src="/myapp.js"></script>
        <script>
        if(navigator.serviceWorker) {
            navigator.serviceWorker.register('/sw.js')
            .catch(function(err) {
            console.error('Unable to register service worker.', err);
         });
            console.info('registered service worker!');
        }

        //fetchAndLog('../storage/biblio/20170824-080810FormulairetestpourProcessoft.pdf');
        fetchAndLog('https://laravel.dev/pj/55');
        fetchAndLog('https://laravel.dev/documents/55');
        fetchAndLog('https://laravel.dev/vehicules');

        //fetchAndLog('/pj/55');
        //fetchAndLog('/pdfs/2017/2017-09-05-b4.pdf');
        //fetchAndLog('/pdfs/b2.pdf');
        //fetchAndLog('/img/b1.jpg');
        //fetchAndLog('/img/b2.jpg');
        //fetchAndLog('/img/b3.jpg');
        //fetchAndLog('/img/b4.jpg');
        </script>
