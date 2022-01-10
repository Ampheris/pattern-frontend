@extends('users/layouts.app')

@section('content')
<a class="back-button" href="{{ route('profile') }}"><i class="material-icons">arrow_back</i>Tillbaka</a>
@if (isset($subscription['id']))
    <div class="container mt-5 mb-5">
        <div class="row g-2">
            <div class="col-md-6">
                <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                    <h5 class="subscription-head">Ditt månadskort</h5>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center"> <span>Period start</span> <span>{{ $subscription['start_date']}}</span> </div>
                        <div class="d-flex justify-content-between align-items-center"> <span>Ska förnyas</span> <span>{{ $subscription['renewal_date']}}</span> </div>
                    </div>
                    <div class="mt-4">
                        @if($subscriptionActive == false)
                        <h3 class="subscription-ended">Din prenumeration har avslutats och är giltig fram till {{ $subscription['renewal_date']}}</h3>
                        @else
                        <form method="post" action="{{ route('endSubscription') }}">
                        @csrf
                            <input type="submit" class="btn btn-danger subscription-button" name="submit" value="Avsluta prenumeration">
                            <input type="hidden" name="subscriptionId" value="{{ $subscription['id'] }}">
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
@elseif($addSubscription == false)
<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                <h5 class="subscription-head">Månadskort</h5> <span class="subscription-price">199 kr/månad</span>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center"> <span>Åk hur mycket du vill</span> <span>Betala varje månad</span> </div>
                    <div class="d-flex justify-content-between align-items-center"> <span>Hur länge du vill</span> <span>Fast pris</span> </div>
                    <div class="d-flex justify-content-between align-items-center"> <span></span> <span>Inga tillägg</span> </div>
                </div>
                <div class="mt-4"> <a href="{{ route('showSubscriptionPayForm')}}" class="btn btn-danger subscription-button">Köp månadskort</a> </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($addSubscription)
<!-- FOR DEMO PURPOSE -->
<div class="container py-5">

<div class="row">
<div class="col-lg-7 mx-auto">
  <div class="bg-white rounded-lg shadow-sm p-5">
    <!-- Credit card form content -->
    <div class="tab-content">
      <!-- credit card info-->
      <div id="nav-tab-card" class="tab-pane fade show active in">
        <h4>SparkiFy månadsprenumeration</h4>
        <form role="form" method="post" action="{{ route('manageSubscription') }}">
        @csrf
          <div class="form-group form-group-pay">
            <label for="username">Full name (on the card)</label>
            <input type="text" name="username" placeholder="Jassa" required class="form-control">
          </div>
          <div class="form-group form-group-pay">
            <label for="cardNumber">Card number</label>
            <div class="form-group form-group-pay">
              <input type="tel" maxlength="19" inputmode="numeric" name="cardNumber" placeholder="Your card number" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group form-group-pay">
                <label><span class="hidden-xs">Expiration</span></label>
                <div class="form-group form-group-pay">
                  <input style="margin-bottom:1em;" type="text" minlength="2" maxlength="2" placeholder="MM" name="month" class="form-control" required>
                  <input type="text" placeholder="YY" name="year" minlength="2" maxlength="2" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group form-group-pay mb-4">
                <label title="Three-digits code on the back of your card">CVV
                                            <i class="fa fa-question-circle"></i>
                                        </label>
                <input type="text" maxlength="3" minlength="3" placeholder="123" name="csv" required class="form-control">
              </div>
            </div>
          </div>
          <input type="submit" name="" value="Confirm" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">
        </form>
      </div>
      <!-- End -->
    </div>
    <!-- End -->
  </div>
</div>
</div>
</div>
@endif
@endsection
