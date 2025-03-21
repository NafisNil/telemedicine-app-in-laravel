<footer class="footer" id="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer__logo">
                        <a href="#"><img src="img/footer-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="footer__newslatter">
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__social">
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
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="{{route('all_service')}}">Departments</a></li>
                        <li><a href="{{route('all_doctor')}}">Find a Doctor</a></li>
                        <li><a href="{{route('index')}}">Tips</a></li>
                        <li><a href="#">News</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h5>Quick links</h5>
                    <ul>
                        <li><a href="#">Facial Fillers</a></li>
                        <li><a href="#">Breast Surgery</a></li>
                        <li><a href="#">Body Lifts</a></li>
                        <li><a href="#">Face & Neck</a></li>
                        <li><a href="#">Fat Reduction</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__address">
                    <h5>Contact Us</h5>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> {{strip_tags(@$general->address)}}</li>
                        <li><i class="fa fa-phone"></i>{{@$general->phone}}</li>
                        <li><i class="fa fa-envelope"></i> {{@$general->email}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-6">
                <div class="footer__map">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                    height="190" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; Probashir Doctor. All rights reserved </p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <div class="col-lg-5">
                    <ul>
                        <li>All Rights Reserved</li>
                        <li>Terms & Use</li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>