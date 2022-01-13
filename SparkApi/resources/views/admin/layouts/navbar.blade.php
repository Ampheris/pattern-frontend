{{-- <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('adminMap') }}">SparkiFy</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse"
                data-target="#slide-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="slide-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/admin/cities') }}"><i class="material-icons">route</i>Städer</a></li>
                <li><a href="{{ route('bikes') }}"><i class="material-icons">electric_scooter</i>Sparkcyklar</a></li>
                <li><a href="{{ route('parking') }}"><i class="material-icons">local_parking</i>Parkeringar</a></li>
                <li><a href="{{ route('chargingstations') }}"><i
                            class="material-icons">battery_charging_full</i>Laddningsstationer</a></li>
            </ul>
        </div>
    </div>
</nav> --}}


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('adminMap') }}">SparkiFy</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse"
                data-target="#slide-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="slide-navbar-collapse">
            <div class="navbar-brand-mobile">
                <a href="{{ route('map') }}">SparkiFy</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/admin/cities') }}"><i class="material-icons">route</i>Städer</a></li>
                <li><a href="{{ route('users') }}">Kunder</a></li>
                <li><a href="{{ route('bikes') }}"><i class="material-icons">electric_scooter</i>Sparkcyklar</a></li>
                <li><a href="{{ route('parking') }}"><i class="material-icons">local_parking</i>Parkeringar</a></li>
                <li><a href="{{ route('chargingstations') }}"><i class="material-icons">battery_charging_full</i>Laddningsstationer</a></li>
                <li><a class="logout-big-screen" href="{{ route('logout') }}">Logga ut</a></li>
            </ul>
            <a class="logout" href="{{ 'logout' }}">Logga ut</a>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
