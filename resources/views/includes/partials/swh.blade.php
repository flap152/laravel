

        <!-- script src="/myapp.js"></script-->
        <script>
            const url2 = "{{config('app.url')}}/api/cacheddocs";
            const fetchAndLog = async (url) => {
                console.log('info', `Requesting ${url}...`);
                try {
                    const response = await fetch(url ,{ credentials: 'include' });
                    const text = await response.text();
                    console.log('info', `...the response for ${url} is :` + text.substr(0,11250) );
                } catch(error) {
                    console.log(`...FFLLAAPP fetch of ${url} failed due to '${error}'.`);
                }
            };

            document.addEventListener("DOMContentLoaded", function(event) {
                //do work
                //This gets the list of documents to cache, and caches it...
                //const url = 'https://randomuser.me/api/?results=10';
                const url = 'https://laravel.dev/api/cacheddocs';
                fetchAndLog('{{config('app.url')}}' +'/documents');
                fetchAndLog('{{config('app.url')}}' +'/vehicules');
                fetchAndLog(url2)
                    .then((resp) => resp.json())
                    .then(function(data) {
                        let documentlist = data.results;
                        documentlist.forEach(function(document) {
                                console.log('we should load document id:'+document);

                                fetchAndLog( '{{config('app.url')}}' + '/pj/'+document);
                                fetchAndLog('{{config('app.url')}}' +'/documents/'+document);


                            }
                        );
                        return "ww";
                    })
                    .catch(function(error) {
                        console.log(JSON.stringify(error));
                    });

            });
        </script>
