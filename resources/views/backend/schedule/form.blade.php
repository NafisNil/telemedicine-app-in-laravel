
@include('backend.sessionMsg')
<div class="card-body">


  <div class="form-group">
    <label for="exampleInputEmail1">Day of the week <span style="color:red" >*</span></label>

    <select class="form-control" id="exampleFormControlSelect1" name="day">
      
      <option value="Saturday">Saturday</option>
      <option value="Sunday">Sunday</option>
      <option value="Monday">Monday</option>
      <option value="Tuesday">Tuesday</option>
      <option value="Wednesday">Wednesday</option>
      <option value="Thursday">Thursday</option>
      <option value="Friday">Friday</option>
    
      
    </select>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Start Time   <span style="color: #424353">(format: 10:00 AM) </span> <span style="color:red" >*</span></label>

    <input type="time"  class="form-control" name="start"  value="{!!old('start',@$edit->start)!!}" placeholder="10:00 AM">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">End Time <span style="color:#363744">(format: 10:00 AM)</span>  <span style="color:red" >*</span></label>

    <input type="time"  class="form-control" name="end"  value="{!!old('end',@$edit->end)!!}">
    <input type="hidden"  class="form-control" name="doctor_id"  value="{{Auth::user()->id}}" placeholder="11:00 AM">

  </div>




      <div class="form-group">
        <label for="exampleInputEmail1">Status <span style="color:red" >*</span></label>
    
        <select class="form-control" id="exampleFormControlSelect1" name="status">
       
          <option value="available" @if(@$edit->status == 'available') selected @endif>Available</option>
          <option value="booked" @if(@$edit->status == 'booked') selected @endif>Booked</option>
        </select>
    
      </div>



</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>








