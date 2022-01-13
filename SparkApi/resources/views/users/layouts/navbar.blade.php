<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('map') }}">SparkiFy</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse"
                data-target="#slide-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="slide-navbar-collapse">
        <div class="navbar-brand-mobile">
            <a  href="{{ route('map') }}">SparkiFy</a>
         </div>
      <ul class="nav navbar-nav">
          <li><a href="{{ route('map') }}"><i class="material-icons">map</i>Karta</a></li>
        <li><a href="{{ route('profile') }}"><i class="material-icons">account_circle</i>Profil</a></li>
        <li><a href="{{ route('history') }}"><i class="material-icons">access_time</i>Historik</a></li>
        <li><a class="logout-big-screen" href="{{ route('logout') }}">Logga ut</a></li>
      </ul>
      <a class="logout" href="{{ route('logout') }}">Logga ut</a>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
