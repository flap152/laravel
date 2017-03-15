<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('fmroorders') }}">Order List</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('fmroorders') }}">View All Orders</a></li>
        <li><a href="{{ URL::to('fmroorders/create') }}">Create a Order</a>
        <li><a href="{{ URL::to('fmroorderresults') }}">View All Results</a></li>
    </ul>
</nav>
