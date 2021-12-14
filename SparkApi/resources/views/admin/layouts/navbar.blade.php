<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('adminMap') }}">SparkiFy</a>
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
        <li><a href="{{ url('/admin/cities') }}">Städer</a></li>
        {{-- <li><a href="{{ route('users') }}">Kunder</a></li> --}}
        <li><a href="{{ route('bikes') }}">Sparkcyklar</a></li>
        <li><a href="{{ route('parking') }}">Parkering</a></li>
        <li><a href="{{ route('chargingstations') }}">Laddningsstationer</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
