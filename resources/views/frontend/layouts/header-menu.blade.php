<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__logo">
        <a href="./index.html"><img src="{{(!empty($general->photo))?URL::to('storage/'.$general->photo):URL::to('image/no_image.png')}}" alt=""></a>
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
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
    </div>
</div>