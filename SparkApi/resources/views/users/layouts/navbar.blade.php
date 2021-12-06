<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('map') }}">SparkiFy</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse" data-target="#slide-navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="slide-navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('profile') }}">Profil</a></li>
        <li><a href="{{ route('history') }}">Historik</a></li>
        <li><a href="#">Hjälp</a></li>
        <li><a href="#">Inställningar</a></li>
        <li><a href="{{ 'admin' }}">Admin</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
