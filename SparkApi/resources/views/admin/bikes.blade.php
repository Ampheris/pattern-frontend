@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createBike') }}">Lägg till sparkcykel</a></button>
    </form>
  </nav>


<h1 class="alltitle">Alla Sparkcyklar</h1>
<div class="container">
	<div class="row">
		@foreach ($bikes as $bike)
			<div class="boxeslist">
				<p class="biggername">{{ $bike["name"] }}</p>
				<p><b>ID</b>: {{ $bike["id"] }}</p>
				<p><b>X,Y</b>: {{ $bike["X"] }}, {{ $bike["Y"] }}</p>
				<p><b>Battery</b>: {{ $bike["battery"] }}%</p>
				<p><b>Status</b>: {{ $bike["status"] }}</p>
				<p><a class="boxlink" href="{{ route('showSingleBike', ['bikeId' => $bike['id']])}} "> Ändra </a>
			</div>
		@endforeach
	</div>
</div>
@endsection
