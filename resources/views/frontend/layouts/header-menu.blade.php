<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__logo">
        <a href="{{route('index')}}"><img src="{{(!empty($general->photo))?URL::to('storage/'.$general->photo):URL::to('image/no_image.png')}}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__btn">
        <a href="#" class="primary-btn">Appointment</a>
    </div>
    <ul class="offcanvas__widget">
        <li><i class="fa fa-phone"></i>{{@$general->phone}}</li>
        <li><i class="fa fa-map-marker"></i>{{strip_tags(@$general->address)}}</li>
   
    </ul>
    <div class="offcanvas__social">
        <a href="{{@$social->facebook}}"><i class="fa fa-facebook"></i></a>
        <a href="{{@$social->twitter}}"><i class="fa fa-twitter"></i></a>
        <a href="{{@$social->instagram}}"><i class="fa fa-instagram"></i></a>
        <a href="{{@$social->youtube}}"><i class="fa fa-youtube"></i></a>
        <a href="{{@$social->linkedin}}"><i class="fa fa-linkedin"></i></a>
    </div>
</div>