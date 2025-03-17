@extends('backend.layouts.master')
@section('title')
    record Form - Index
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Patient Record</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Patient Record</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
       
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3" id="printableArea">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Probashir Doctor
                  <small class="float-right">Date: {{$record->created_at->format('d M,Y')}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                @php
                $doctor = App\Models\User::where('id', $record->doctor_id)->first();
          @endphp
                From
                <address>
                  <strong>{{@$doctor->full_name}}</strong><br>
              
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                @php
                $patient = App\Models\User::where('id', $record->patient_id)->first();
          @endphp

                To
                <address>
                  <strong>{{$patient->full_name}}</strong><br>
         
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                {{-- <b>Invoice #007612</b><br>
                <br>
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567 --}}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->



            <div class="row" >
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Diagnosis Report:</p>
              

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
               {!!  $record->diagnosis !!}
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Treatment</p>

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    {!!  $record->prescription !!}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.invoice -->

          <div class="row no-print">
            <div class="col-12">
              <button type="button" class="btn btn-default" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</button>
            </div>
          </div>

          <script>
            function printDiv(divName) {
              var printContents = document.getElementById(divName).innerHTML;
              var originalContents = document.body.innerHTML;
          
              document.body.innerHTML = printContents;
          
              window.print();
          
              document.body.innerHTML = originalContents;
            }
          </script>
          
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection