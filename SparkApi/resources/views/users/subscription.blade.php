@extends('users/layouts.app')

@section('content')
@if (isset($subscription['id']) && $subscription['cancelation_date'] == null)
{{$subscription}}
    <form method="post" action="{{ route('endSubscription') }}">
    @csrf
        <input type="submit" name="submit" value="Avsluta subscription">
        <input type="hidden" name="subscriptionId" value="{{ $subscription['id'] }}">
    </form>
@else
<!-- FOR DEMO PURPOSE -->
<div class="container py-5">

<div class="row">
<div class="col-lg-7 mx-auto">
  <div class="bg-white rounded-lg shadow-sm p-5">
    <!-- Credit card form content -->
    <div class="tab-content">
      <!-- credit card info-->
      <div id="nav-tab-card" class="tab-pane fade show active in">
        <p class="alert alert-success">Some text success or error</p>
        <form role="form" method="post" action="{{ route('manageSubscription') }}">
        @csrf
          <div class="form-group">
            <label for="username">Full name (on the card)</label>
            <input type="text" name="username" placeholder="Jassa" required class="form-control">
          </div>
          <div class="form-group">
            <label for="cardNumber">Card number</label>
            <div class="form-group">
              <input type="tel" maxlength="19" inputmode="numeric" name="cardNumber" placeholder="Your card number" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label><span class="hidden-xs">Expiration</span></label>
                <div class="form-group">
                  <input style="margin-bottom:1em;" type="text" minlength="2" maxlength="2" placeholder="MM" name="month" class="form-control" required>
                  <input type="text" placeholder="YY" name="year" minlength="2" maxlength="2" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group mb-4">
                <label title="Three-digits code on the back of your card">CVV
                                            <i class="fa fa-question-circle"></i>
                                        </label>
                <input type="text" maxlength="3" minlength="3" name="csv" required class="form-control">
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
