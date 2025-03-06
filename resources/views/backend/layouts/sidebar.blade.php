<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
      <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Probashir Doctor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->photo))?URL::to('storage/'.Auth::user()->photo):URL::to('image/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                <a href="{{route('logout')  }}" class="nav-link"  onclick="event.preventDefault();
                                    this.closest('form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </form>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
                @php
                $prefix = Request::route()->getPrefix();
                $route = Request::route()->getName();
                @endphp
              </p>
            </a>

            
            <ul class="nav nav-treeview">
              @if (Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="{{route('specialization.index')}}" class="nav-link {{$route == 'specialization.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Specialization</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('doctor.index')}}" class="nav-link {{$route == 'doctor.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctor Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('payment_method.index')}}" class="nav-link {{$route == 'payment_method.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Method</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('general.index')}}" class="nav-link {{$route == 'general.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('social.index')}}" class="nav-link {{$route == 'social.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media Info</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link {{$route == 'slider.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('about.index')}}" class="nav-link {{$route == 'about.index'?'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>

              @elseif (Auth::user()->role == 'doctor')
              <li class="nav-item">
                <a href="{{route('schedule.index')}}" class="nav-link {{$route == 'schedule.index'?'active':''}}" >
                  <i class="far fa-square nav-icon"></i>
                  <p>Schedule Fixation</p>
                </a>
              </li>
              @endif


             



      
              {{-- <li class="nav-item">
                <a href="{{ route('logo.index') }}" class="nav-link {{$route == 'logo.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about.index') }}" class="nav-link {{$route == 'about.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mission.index') }}" class="nav-link {{$route == 'mission.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mission </p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ route('vision.index') }}" class="nav-link {{$route == 'vision.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vision </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('focus.index') }}" class="nav-link {{$route == 'focus.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Focus Area </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('event.index') }}" class="nav-link {{$route == 'event.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link {{$route == 'blog.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('team.index') }}" class="nav-link {{$route == 'team.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('social.index') }}" class="nav-link {{$route == 'social.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('general.index') }}" class="nav-link {{$route == 'general.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partner.index') }}" class="nav-link {{$route == 'partner.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonial.index') }}" class="nav-link {{$route == 'testimonial.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial</p>
                </a>
              </li> --}}
            </ul> 
          </li>


          <li class="nav-header">EXAMPLES</li>
 
          <li class="nav-header">MISCELLANEOUS</li>

          <li class="nav-header">MULTI LEVEL EXAMPLE</li>

          <li class="nav-header">LABELS</li>
    
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>