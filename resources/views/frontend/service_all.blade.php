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
                    <h2>All Department </h2>
                    <div class="breadcrumb__links">
                        <a href="{{route('index')}}">Home</a>
                        <span>All Department</span>
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
            @foreach ($specialization as $item)
               
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                   
                    <div class="blog__item__text">
                        <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="" style="border-radius: 8px" class="mb-4"> 

                        <h5><a href="{{route('details_service', [$item->id, $item->slug])}}">{{$item->title}}</a></h5>
                        <p>{!! $item->description !!}</p>
                        <ul>
                          
                            <li>{{$item->created_at->format('d M, Y')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-lg-12 text-center">
                <div class="load__more">
                   {{$specialization->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection