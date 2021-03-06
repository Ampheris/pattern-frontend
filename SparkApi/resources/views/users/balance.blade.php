@extends('users/layouts.app')

@section('content')
<a class="back-button" href="{{ route('profile') }}"><i class="material-icons">arrow_back</i>Tillbaka</a>

<!-- FOR DEMO PURPOSE -->
<div class="container py-5">

<div class="row">
<div class="col-lg-7 mx-auto">
  <div class="bg-white rounded-lg shadow-sm p-5">
    <!-- Credit card form content -->
    <div class="tab-content">
      <!-- credit card info-->
      <div id="nav-tab-card" class="tab-pane fade show active in">
         @if (isset($message))
         <h4>Du har för lite pengar på ditt saldo. Fyll på och avsluta sen åkturen.</h4>
         @else
         <h4>Fyll på saldo</h4>
         @endif
        <form role="form" method="post" action="{{ route('addToBalance') }}">
        @csrf
        <div class="form-group form-group-pay">
          <label for="username">Amount</label>
          <input type="number" name="balance" placeholder="0" required class="form-control">
        </div>
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
@endsection
