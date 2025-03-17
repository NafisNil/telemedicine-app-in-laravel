
@include('backend.sessionMsg')
<div class="card-body">


  <div class="form-group">
    <label for="exampleInputEmail1">Diagnosis Report</label>

    <textarea name="diagnosis" id="" cols="30" rows="10" class="form-control">{!!old('diagnosis',@$edit->diagnosis)!!}</textarea>
    <input type="hidden"  class="form-control" name="patient_id"  value="{{$patient_id}}">
    <input type="hidden"  class="form-control" name="doctor_id"  value="{{$doctor_id}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Prescription</label>

    <textarea name="prescription" id="" cols="30" rows="10" class="form-control">{!!old('prescription',@$edit->prescription)!!}</textarea>

  </div>


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>


<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>



<script>

    CKEDITOR.replace( 'diagnosis' );
    CKEDITOR.replace( 'prescription' );

</script>




