@extends('admin.master')

@section('title')
Updated-Student
@endsection

@section('content')
<div class="container">
  <h2 class="text-center">Update Registration</h2>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  {!! Form::open(['url' => '/updatestudentprofile', 'method'=>'POST', 'class' => 'form-horizontal', 'name'=>'editProductForm']) !!}
  <div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>
     <div class="form-group">
                <input type="hidden" value="{{$students->id}}" name="id">
                <label for="inputPassword3" class="col-sm-2 control-label">Room no</label>
                <div class="col-sm-10">
                    <select class="form-control" name="roomid">
                        <option>Select Room No</option>
                          @foreach($rooms as $result)
                        <option value="{{$result->id}}">{{$result->room}}</option>
                       @endforeach
                    </select>
                </div>
            </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Seater</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="{{$students->seater}}" name="seater">
       <span class="text-danger">{{ $errors->has('seater') ? $errors->first('seater') : '' }}</span>
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Fees Per Month</label>
      <div class="col-sm-10">          
     <input type="text" class="form-control" id="pwd" value="{{$students->feesmonth}}" name="feesmonth">
      <span class="text-danger">{{ $errors->has('feesmonth') ? $errors->first('feesmonth') : '' }}</span>
      </div>
    </div>

    <div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
</div>

    <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="departmentid">
                        <option>Select Room No</option>
                          @foreach($department as $dept)
                        <option value="{{$dept->id}}">{{$dept->fullname}}</option>
                       @endforeach
                    </select>
                </div>
            </div>

             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->stdname}}" name="stdname">
                    <span class="text-danger">{{ $errors->has('stdname') ? $errors->first('stdname') : '' }}</span>
                </div>
            </div>
                  <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Roll/ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->rool}}" name="rool">
                    <span class="text-danger">{{ $errors->has('rool') ? $errors->first('rool') : '' }}</span>
                </div>
            </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    <select class="form-control" name="gender">
                        <option>Select Gender</option>
                         <?php
                            if ($students['gender'] == 'male') { ?>
                          <option selected="selected" value="male">Male</option>
                        <option value="female">Female</option> 
                        <?php } else{ ?>
                        <option selected="selected" value="female">Female</option>
                         <option value="male">Male</option>
                       <?php } ?>   
                        
                   
                    </select>
                </div>
            </div>

             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->contact}}" name="contact">
                    <span class="text-danger">{{ $errors->has('contact') ? $errors->first('contact') : '' }}</span>
                </div>
            </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Emergency Contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->emrcontact}}" name="emrcontact">
                    <span class="text-danger">{{ $errors->has('emrcontact') ? $errors->first('emrcontact') : '' }}</span>
                </div>
            </div>

             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Guardian Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->garname}}" name="garname">
                    <span class="text-danger">{{ $errors->has('garname') ? $errors->first('garname') : '' }}</span>
                </div>
            </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Guardian Contact </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->garcontact}}" name="garcontact">
                    <span class="text-danger">{{ $errors->has('garcontact') ? $errors->first('garcontact') : '' }}</span>
                </div>
            </div>
  <div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Permanent Address</h4> </label>
</div>
 
     <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="8">{{$students->address}}</textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
            </div>
        <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->city}}" name="city">
                    <span class="text-danger">{{ $errors->has('city') ? $errors->first('city') : '' }}</span>
                </div>
            </div>
         <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$students->state}}" name="state">
                    <span class="text-danger">{{ $errors->has('state') ? $errors->first('state') : '' }}</span>
                </div>
            </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 text-center">
      <input type="reset" name="reset" class="btn btn-success">
       <input type="submit" name="update" value="Update" class="btn btn-primary">
      </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    document.forms['editProductForm'].elements['roomid'].value={{ $students->roomid }}
    document.forms['editProductForm'].elements['departmentid'].value={{ $students->departmentid }} 
</script>
@endsection