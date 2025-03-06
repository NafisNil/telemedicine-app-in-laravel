
@include('backend.sessionMsg')
<div class="card-body">

  <div class="form-group row">
    <label for="Image" class="col-md-4 col-form-label text-md-right"></label>
    <div class="col-md-6">

    <img id="showImage" src="{{(!empty($edit->photo))?URL::to('storage/'.$edit->photo):URL::to('image/no_image.png')}}"  style="widows: inherit; width:120px; height:120px; border:1px solid #042b3d" alt="">
  </div>
</div>
  <div class="form-group">
    <label for="exampleInputFile">Logo <span style="color:red" >*</span></label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="photo" class="custom-file-input"  id="image"  value="{{ @$edit->photo }}">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>

    </div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Full Name <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="full_name"  value="{!!old('full_name',@$edit->full_name)!!}">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email<span style="color:red" >*</span></label>

    <input type="email"  class="form-control" name="email"  value="{!!old('email',@$edit->email)!!}">

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number<span style="color:red" >*</span></label>

    <input type="number"  class="form-control" name="phone"  value="{!!old('phone',@$edit->phone)!!}" placeholder="(880) 123 456 7890" minlength="9">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Date of Birth<span style="color:red" >*</span></label>

    <input type="date"  class="form-control" name="dob"  value="{!!old('dob',@$edit->dob)!!}" >

  </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Address <span style="color:red" >*</span></label>
    
        <textarea name="address" id="" cols="30" rows="10" class="form-control">{!!old('address',@$edit->address)!!}</textarea>
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Specialization <span style="color:red" >*</span></label>
    
        <select class="form-control" id="exampleFormControlSelect1" name="specialization_id">
          @foreach ($specialization as $item)
          <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
        
          
        </select>
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Bio  <span style="color:red" >*</span></label>
    
        <textarea name="bio" id="" cols="30" rows="10" class="form-control">{!!old('bio',@$edit->bio)!!}</textarea>
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Experience  <span style="color:red" >*</span></label>
    
        <textarea name="experience" id="" cols="30" rows="10" class="form-control">{!!old('experience',@$edit->experience)!!}</textarea>
    
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">License Number <span style="color:red" >*</span></label>
    
        <input type="license_number"  class="form-control" name="license_number"  value="{!!old('license_number',@$edit->license_number)!!}">
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Price (USD)  <span style="color:red" >*</span></label>
    
        <input type="price"  class="form-control" name="price"  value="{!!old('price',@$edit->price)!!}">
    
      </div>


    





</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>


<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>



<script>

    CKEDITOR.replace( 'address' );
    CKEDITOR.replace( 'bio' );
    CKEDITOR.replace( 'experience' );


</script>




