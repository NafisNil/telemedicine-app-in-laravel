@extends('frontend.layouts.master')
@section('title')
    Probashir Doctor - Doctors
@endsection
@section('content')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-option spad set-bg" data-setbg="{{(!empty($slider->photo))?URL::to('storage/'.$slider->photo):URL::to('image/no_image.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>All Doctors </h2>
                    <div class="breadcrumb__links">
                        <a href="{{route('index')}}">Home</a>
                        <span>All Doctors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            @foreach ($doctor as $item)
               
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                   
                    <div class="blog__item__text">
                        <a href="{{route('details_doctor', $item->slug)}}">
                        <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="" style="border-radius: 20px" class="mb-4"> 
                        @php
                            $special = App\Models\Specialization::where('id', $item->specialization_id)->first();
                        @endphp
                        <h5><a href="{{route('details_doctor', [$item->slug])}}">{{$item->full_name}}</a></h5>
                        <p>{!! $special->title !!}</p>
                        <ul>
                        </a>
                        
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-lg-12 text-center">
                <div class="load__more">
                   {{$doctor->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection