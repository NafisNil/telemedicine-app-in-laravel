@extends('backend.layouts.master')
@section('title')
    Probashir App  -Tips Create
@endsection
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Tips</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tips</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <section class="content">
              <div class="row">
                  <div class="col-12" id="accordion">
                      <div class="card card-primary card-outline">
                          <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                              <div class="card-header">
                                  <h4 class="card-title w-100">
                                     {{$show->problem}}
                                  </h4>
                              </div>
                          </a>
                          <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                <h3>Cause and Symptoms</h3>
                                 {!! @$show->symptoms !!}
                              </div>
                          </div>

                          <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <h3>Remedy</h3>
                                {!! @$show->remedy !!}
                            </div>
                        </div>
                      </div>
                    
                  </div>
              </div>

          </section>
          <!-- /.content -->
@endsection