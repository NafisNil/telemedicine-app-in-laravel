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
                    <h2>{{@$doctor->full_name}} </h2>
                    <div class="breadcrumb__links">
                        <a href="{{route('index')}}">Home</a>
                        <span>{{$doctor->specialization_name->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Details Section Begin -->
<section class="doctor-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="doctor__details__pic">
                    <img src="{{(!empty($doctor->photo))?URL::to('storage/'.$doctor->photo):URL::to('image/no_image.png')}}" alt="{{$doctor->full_name}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="doctor__details__text">
                    <h3>{{@$doctor->full_name}}</h3> <br>
                    <p><strong>Specialization:</strong> {{$doctor->specialization_name->title}}</p>
                    
                    <p><strong>Date of Birth:</strong> {{@$doctor->dob}} years</p>
                    <p><strong>License Number:</strong> {{@$doctor->license_number}}</p>
                    <p><strong>Bio:</strong> {!! $doctor->bio !!}</p>
                  
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="pricing__item">
                    <div class="pricing__item__title">
                        <h3>   Availability and Fees</h3>
                         
                    </div>
                    <form action="{{route('store_appointment_info')}}" method="post">
                        @csrf
                    <ul>
                        

                       
                        <li>
                            <h6>Fees</h6>
                            
                            <span><b>{{@$doctor->price}}</b></span> USD
                            <input type="hidden" value="{{@$doctor->price}}" name="amount">
                            <input type="hidden" value="{{$doctor->id}}" name="doctor_id">
                            <input type="hidden" value="{{@Auth::user()->id}}" name="patient_id">
                        </li>
                        
                        <li>
                            <h6>Availability</h6>
                            <div class="text-center">
                                <select name="schedule_id" class="form-control" style="float: none !important;">
                                    @foreach ($schedule as $item)
                                    @php
                                    $carbonstartTime = Carbon\Carbon::createFromFormat('H:i:s', $item->start); // Parse the time string
                                    $formattedstartTime = $carbonstartTime->format('g:i A'); // Format as "g:i A"
            
                                    $carbonendTime = Carbon\Carbon::createFromFormat('H:i:s', $item->end); // Parse the time string
                                    $formattedendTime = $carbonendTime->format('g:i A'); // Format as "g:i A"
                                @endphp
                                        <option  value="{{ $item->id }}" style="float: none !important;">{{ $item->day }} - {{ $formattedstartTime }} : {{$formattedendTime}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                    </ul>
                    @if(Auth::check() && Auth::user()->role == 'patient')
                    
                        <button type="submit"  class="primary-btn mt-5">Book Now</button>
                   @else
                   <a href="{{route('patient_registration_form')}}" class="primary-btn mt-5 " >Book now</a>
                   @endif    
               
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Doctor Details Section End -->

@endsection