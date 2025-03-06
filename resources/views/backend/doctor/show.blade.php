@extends('backend.layouts.master')
@section('title')
Probashir Doctor - Show Doctor Info
@endsection

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Doctor Profile</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{(!empty($show->photo))?URL::to('storage/'.$show->photo):URL::to('image/no_image.png')}}"
                             alt="{{$show->full_name}}">
                      </div>
      
                      <h3 class="profile-username text-center">{{@$show->full_name}}</h3>
      
                      <p class="text-muted text-center">{{@$show->specialization_name->title}}</p>
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Total Appointments:</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                          <b>Total Prescriptions: </b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                          <b>Total Cost:</b> <a class="float-right">{{@$show->price}} USD</a>
                        </li>
                      </ul>
      
                      <a href="#" class="btn btn-primary btn-block"><b>Details</b></a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
                  <!-- About Me Box -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">About {{@$show->full_name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
      
                      <p class="text-muted">
                        {!!$show->address!!}
                      </p>
      
                      <hr>
      
                      <strong><i class="fas  fa-calendar mr-1"></i> Date of Birth</strong>
                      @php
                    
                      $carbonDate = Carbon\Carbon::parse($show->dob);
                      $formattedDate = $carbonDate->format('F d, Y'); // Example: March 24, 1978
                      @endphp
                      <p class="text-muted">{{@$formattedDate}}</p>
      
                      <hr>
      
                      <strong><i class="fas fa-pencil-alt mr-1"></i> License Number</strong>
      
                      <p class="text-muted">
                      {{@$show->license_number}}
                      </p>
      
                      <hr>
      
                      <strong><i class="far fa-file-alt mr-1"></i> Phone and Email</strong>
                      <br>
                      <a href="tel:{{@$show->phone}}">{{@$show->phone}}</a>
                      <a href="mailto:{{@$show->email}}">{{@$show->email}}</a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Specialization</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Experience</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Bio</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                          <!-- Post -->
                          <div class="post">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="{{(!empty($show->specialization_name->photo))?URL::to('storage/'.$show->specialization_name->photo):URL::to('image/no_image.png')}}" alt="user image">
                              <span class="username">
                              
                            </div>
                            <!-- /.user-block -->
                            <p>
                              {!! @$show->specialization_name->title!!}
                            </p>
      
                  
                          </div>
 
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                          <!-- The timeline -->
                          <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                          
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-sticky-note bg-primary"></i>
      
                              <div class="timeline-item">
                            
                                <div class="timeline-body">
                                {!!  @$show->experience !!}
                                </div>
                            
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                        
      
            
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                         
      
                            
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                          
                          </div>
                        </div>
                        <!-- /.tab-pane -->
      
                        <div class="tab-pane" id="settings">
                          <i class="fas fa-address-card bg-primary"></i>
      
                          <div class="timeline-item">
                        
                            <div class="timeline-body">
                            {!!  @$show->bio !!}
                            </div>
                        
                          </div>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
@endsection