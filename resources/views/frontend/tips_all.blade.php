@extends('frontend.layouts.master')
@section('title')
    Probashir Doctor - Healthcare Tips
@endsection
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>All HealthCare Tips </h2>
                        <div class="breadcrumb__links">
                            <a href="{{route('index')}}">Home</a>
                            <span>All HealthCare Tips</span>
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
                @foreach ($tips as $item)
                     @php
                        $user = App\Models\Tip::username($item->user_id);
                    @endphp
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                       
                        <div class="blog__item__text">
                            <h5><a href="{{route('details_tips', $item->slug)}}">{{$item->problem}}</a></h5>
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
                </div>
                @endforeach


                <div class="col-lg-12 text-center">
                    <div class="load__more">
                       {{$tips->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection