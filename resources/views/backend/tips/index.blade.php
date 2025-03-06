@extends('backend.layouts.master')
@section('title')
    Tips Form - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Tips Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tips form</li>
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
                <h3 class="card-title">Tips form</h3>


                <a href="{{route('tips.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Symptoms and Cause</th>
                    <th>Remedy</th>

              
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                    @foreach ($tips as $key=>$item)

                    @php
                        $user = App\Models\Tip::username($item->user_id);
                        $role = $user->role;
                    @endphp
                    @if (Auth::user()->role == 'doctor')
                        @if ($role == 'doctor')
                        <tr>
                          <td>{{ ++$key }}</td>
                        <td>{{$item->problem}}</td>
                        <td>{!! Str::substr($item->symptoms, 0, 100) !!} ...</td>
                        <td>{!! Str::substr($item->remedy, 0, 100) !!} ...</td>
                 
                         <td>
      
      
                            <a href="{{route('tips.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                            <a href="{{route('tips.show',[$item])}}" title="Show"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
      
      
      
      
                            <form action="{{route('tips.destroy',[$item])}}" id="delete-form-{{ $item->id }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-outline-danger btn-sm delete-btn"  title="Delete" data-id="{{ $item->id}}"><i class="fas fa-trash"></i></button>
                            </form>
      
      
      
                          </td>
      
                        </tr>
                        @endif
                    @elseif(Auth::user()->role == 'admin')
                    <tr>
                      <td>{{ ++$key }}</td>
                    <td>{{$item->problem}}</td>
                    <td>{!! Str::substr($item->symptoms, 0, 100) !!} ...</td>
                    <td>{!! Str::substr($item->remedy, 0, 100) !!} ...</td>
             
                     <td>
  
  
                        <a href="{{route('tips.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                        <a href="{{route('tips.show',[$item])}}" title="Show"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
  
  
  
  
                        <form action="{{route('tips.destroy',[$item])}}" id="delete-form-{{ $item->id }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-outline-danger btn-sm delete-btn"  title="Delete" data-id="{{ $item->id}}"><i class="fas fa-trash"></i></button>
                        </form>
  
  
  
                      </td>
  
                    </tr>
                    @endif

             

                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Symptoms and Cause</th>
                    <th>Remedy</th>
                
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
