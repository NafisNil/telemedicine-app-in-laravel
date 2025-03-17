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

<section class="registration-login spad">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-4">Register</h3>
                <form action="{{ route('patient.register') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="sex" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Login</h3>
                <form action="{{ route('patient.login') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection