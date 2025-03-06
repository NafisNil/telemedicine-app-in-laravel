
@include('backend.sessionMsg')
<div class="card-body">

  <div class="form-group">
    <label for="exampleInputEmail1">Problem/Disease <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="problem"  value="{!!old('problem',@$edit->problem)!!}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Cause and Symptoms</label>

    <textarea name="symptoms" id="" cols="30" rows="10" class="form-control">{!!old('symptoms',@$edit->symptoms)!!}</textarea>

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Remedy</label>

    <textarea name="remedy" id="" cols="30" rows="10" class="form-control">{!!old('remedy',@$edit->remedy)!!}</textarea>

  </div>


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>


<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>



<script>

    CKEDITOR.replace( 'symptoms' );
    CKEDITOR.replace( 'remedy' );

</script>




