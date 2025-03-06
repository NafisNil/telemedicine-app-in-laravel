@extends('frontend.layouts.master')
@section('title')
    Probashir Doctor - Index
@endsection
@section('content')
     <!-- Hero Section Begin -->
     <section class="hero spad set-bg" data-setbg="{{(!empty($slider->photo))?URL::to('storage/'.$slider->photo):URL::to('image/no_image.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__text">
                        <span style="color: #000">{{$slider->title}}</span>
                        <h2 style="color:#12131e">{{strip_tags(@$slider->subtitle)}}</h2>
                        <a href="#" class="primary-btn normal-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Consultation Section Begin -->
    <section class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="consultation__form">
                        <div class="section-title">
                            <span>REQUEST FOR YOUR</span>
                            <h2>Consultation</h2>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Email">
                            <div class="datepicker__item">
                                <input type="text" placeholder="Date" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <select>
                                <option value="">Type of service</option>
                                <option value="">Advanced equipment</option>
                                <option value="">Qualified doctors</option>
                                <option value="">Certified services</option>
                                <option value="">Emergency care</option>
                            </select>
                            <button type="submit" class="site-btn">Book appoitment</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="consultation__text">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__text__item">
                                    <div class="section-title">
                                        <span>Welcon to Probashir Doctor</span>
                                        <h2>{{@$about->title}}</h2>
                                    </div>
                                    <p>{!!  $about->description !!}.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__video set-bg" data-setbg="img/consultation-video.jpg">
                                    <a href="https://www.youtube.com/watch?v={{@$about->video_link}}" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Consultation Section End -->

    <!-- Chooseus Section Begin -->
    {{-- <section class="chooseus spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Why choose us?</span>
                        <h2>Offer for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($specialization as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                      
                        <h5>{{$item->title}}</h5>
                        <p>{!!  $item->description!!}</p>
                    </div>
                </div>
                @endforeach
             

            </div>
        </div>
    </section> --}}
    <!-- Chooseus Section End -->

    <!-- Services Section Begin -->
    <section class="services spad set-bg" data-setbg="{{asset('frontend')}}/img/services-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Our services</span>
                        <h2>Offer for you</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__btn">
                        <a href="#" class="primary-btn">All Service</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($specialization as $item)
                <div class="col-lg-6 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                            <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="" style="max-height: 50px">
                        </div>
                        <div class="services__item__text">
                            <h5>{{$item->title}}</h5>
                            <p>{!! $item->description !!}
                            </p>
                        </div>
                    </div>
                </div>
     
                @endforeach

            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>Our Expert Doctors</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($doctor as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <a href="">
                        <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="">
                        @php
                            $specialization = App\Models\Specialization::where('id',$item->specialization_id)->first();
                        @endphp
                        <h5>{{@$item->full_name}}</h5>
                        <span>{{@$specialization->title}}</span>
                    </a>
                    </div>
                </div>
                @endforeach
      

            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Gallery Begin -->

    <!-- Gallery End -->

    <!-- Latest News Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Our News</span>
                        <h2>Health care tips</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="latest__btn">
                        <a href="#" class="primary-btn">View all tips</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($tips as $item)
                @php
                    $user = App\Models\Tip::username($item->user_id);
                @endphp
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="latest__item">
                        <h5><a href="{{route('details_tips', $item->slug)}}">{{$item->problem}}</a></h5>
                        <p>{!! Str::substr($item->symptoms, 0, 100) !!}...</p>
                        <ul>
                            <li><img src="{{(!empty($user->photo))?URL::to('storage/'.$user->photo):URL::to('image/no_image.png')}}" alt="">
                                @if ($user->full_name != null)
                                {{$user->full_name}}
                                @else
                                {{$user->name}}
                                @endif
                              </li>
                            <li>{{$item->created_at->format('d M, Y')}}</li>
                        </ul>
                    </div>
                </div>
                @endforeach

  
            </div>
        </div>
    </section>
    <!-- Latest News End -->

@endsection