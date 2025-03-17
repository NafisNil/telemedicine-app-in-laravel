@extends('frontend.layouts.master')
@section('title')
    Probashir Doctor - Services
@endsection
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option spad set-bg" data-setbg="{{(!empty($slider->photo))?URL::to('storage/'.$slider->photo):URL::to('image/no_image.png')}}">
<div class="container">
  <div class="row">
      <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
              <h2>Patient Registration  </h2>
              <div class="breadcrumb__links">
                  <a href="{{route('index')}}">Home</a>
                  <span>Patient Registration</span>
              </div>
          </div>
      </div>
  </div>
</div>
</section>

<!-- Payment Method Form Begin -->
<section class="payment-method-form spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="form-wrapper">
          <h3 class="text-center">Select Payment Method</h3>
          <form action="#" method="POST">
            @csrf
            <div class="form-group">
              <label>Select Payment Methods</label>
              <div class="payment-method-options">
                @foreach($payment_method as $paymentMethod)
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="{{ $paymentMethod->id }}" id="payment_method_{{ $paymentMethod->id }}">
                    <label class="form-check-label" for="payment_method_{{ $paymentMethod->id }}">
                      <img src="{{(!empty($paymentMethod->photo))?URL::to('storage/'.$paymentMethod->photo):URL::to('image/no_image.png')}}" alt="{{ $paymentMethod->name }}" class="payment-method-image">
                      {{ $paymentMethod->name }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Payment Method Form End -->

@endsection