@extends('backend.layouts.master')
@section('title')
    record Form - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>record Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">record form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row offset-1">
          <!-- left column -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">record form</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Patient </th>
                    <th>Created At</th>

              
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                    @foreach ($record as $key=>$item)

                    @php
                          $patient = App\Models\User::where('id', $item->patient_id)->first();
                    @endphp


                  <tr>
                    <td>{{ ++$key }}</td>
                  <td>{{$patient->full_name}}</td>
           
                    <td>{{$item->created_at->format('d M,Y')}}</td>

<td>
                      {{-- <a href="{{route('record.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a> --}}
                      <a href="{{route('record.show',[$item->id])}}" title="Show"><button class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></button></a>




                      <form action="{{route('record.destroy',[$item])}}" id="delete-form-{{ $item->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm delete-btn"  title="Delete" data-id="{{ $item->id}}"><i class="fas fa-trash"></i></button>
                      </form>



                    </td>

                  </tr>

                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Patient </th>
                    <th>Created At</th>

                
                    <th>Action</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var formId = $(this).data('id');
            var form = $('#delete-form-' + formId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',   

                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();   

                }
            });
        });
    });
</script>

@endsection
