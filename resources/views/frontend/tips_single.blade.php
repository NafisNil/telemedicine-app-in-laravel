@extends('frontend.layouts.master')
@section('title')
    Probashir Doctor - {{@$tips_single->problem}}
@endsection
@section('content')
        <!-- Blog Details Section Begin -->
        @php
        $user = App\Models\Tip::username($tips_single->user_id);
    @endphp
        <section class="blog-details spad">
            <div class="container">
                <div class="blog__details__hero set-bg" data-setbg="{{(!empty($slider->photo))?URL::to('storage/'.$slider->photo):URL::to('image/no_image.png')}}">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-7 text-center">
                            <div class="blog__hero__text">
                                <h2>{{$tips_single->problem}}</h2>
                                <ul>
                                    <li><img src="{{(!empty($user->photo))?URL::to('storage/'.$user->photo):URL::to('image/no_image.png')}}" alt="">    @if ($user->full_name != null)
                                        {{$user->full_name}}
                                        @else
                                        {{$user->name}}
                                        @endif</li>
                                    <li>{{$tips_single->created_at->format('d M, Y')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
      
                        <div class="blog__details__text">
                            <div class="blog__details__text__item">
                                <h5>Cause and Symptoms</h5>
                                <p>{!! @$tips_single->symptoms !!}</p>
                            </div>
                            <div class="blog__details__text__item">
                                <h5>Remedies</h5>
                                <p>{!! @$tips_single->remedy  !!}</p>
                            </div>
                        </div>
          
                    </div>
   
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->
@endsection