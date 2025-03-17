<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="header__top__left">
                        <li><i class="fa fa-phone"></i> {{@$general->phone}}</li>
                        <li><i class="fa fa-map-marker"></i> {{strip_tags(@$general->address)}}</li>

                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="header__top__right">
                        <a href="{{@$social->facebook}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{@$social->twitter}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{@$social->instagram}}"><i class="fa fa-instagram"></i></a>
                        <a href="{{@$social->youtube}}"><i class="fa fa-youtube"></i></a>
                        <a href="{{@$social->linkedin}}"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{route('index')}}"><img src="{{(!empty($general->photo))?URL::to('storage/'.$general->photo):URL::to('image/no_image.png')}}" alt="" style="max-height: 64px"></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="header__menu__option">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('index')}}">Home</a></li>
                        
                            <li><a href="{{route('all_service')}}">Services</a></li>
                
                            <li><a href="{{route('all_tips')}}">Healthcare Tips</a></li>
                            <li><a href="{{route('index')}}#footer">Contact</a></li>
                            <li>
                            @if(Auth::check() && Auth::user()->role == 'patient')
                                <a href="{{route('dashboard')}}">
                                 <button class="btn btn-sm btn-outline-success">{{Auth::user()->full_name}}</button> 
                                </a>
                            @else
                            <a href="{{route('patient_registration_form')}}">
                                <button class="btn btn-sm btn-outline-success">Login/Registration</button> 
                            </a>
                            @endif    
                    </li>

                        </ul>
                    </nav>
                    <div class="header__btn">
                        <a href="{{route('all_doctor')}}" class="primary-btn">Appointment</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>