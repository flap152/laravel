@extends('frontend.layouts.app')

@section('title', 'Page de test FLap')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">PAge de test de FLap</div>

                <div class="panel-body">

   Mon test.....


<script>
                    if (localStorage) {
                        document.write ('LocalStorage is supported!');

                    } else {
                        document.write('No support. Use a fallback such as browser cookies or store on the server.');
                    }


                    window.onload = function() {

                        // Check for LocalStorage support.
                        if (localStorage) {

                            // Add an event listener for form submissions
                            document.getElementById('contactForm').addEventListener('submit', function() {
                                // Get the value of the name field.
                                var name = document.getElementById('name').value;

                                // Save the name in localStorage.
                                localStorage.setItem('name', name);
                            });

                            // Retrieve the users name.
                            var name = localStorage.getItem('name');

                            if (name != "undefined" || name != "null") {
                                document.getElementById('welcomeMessage').innerHTML = "Hello " + name + "!";
                            } else
                                document.getElementById('welcomeMessage').innerHTML = "Hello!";
                        }

                        }

                    }

       </script>

                    <form id="contactForm" action="flap" method="POST">
                        <div class="field">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message"></textarea>
                        </div>
                        <div class="field">
                            <input type="submit" value="send">
                        </div>
                    </form>


                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection