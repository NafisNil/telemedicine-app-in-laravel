
@include('backend.sessionMsg')
<div class="card-body">




  <div class="form-group">
    <label for="exampleInputEmail1">Title<span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="title"  value="{!!old('title',@$edit->title)!!}">

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Video Link <span style="color:red" >*</span></label>

    <input type="url"  class="form-control" name="video_link"  value="https://www.youtube.com/watch?v={{$edit->video_link}}">

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Description <span style="color:red" >*</span></label>

    <textarea name="description" id="" cols="30" rows="10" class="form-control">{!!old('description',@$edit->description)!!}</textarea>

  </div>


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>

    CKEDITOR.replace( 'description' );

</script>





