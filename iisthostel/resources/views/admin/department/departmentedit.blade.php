@extends('admin.master')

@section('title')
Update-Department
@endsection

@section('content')
<div class="container">
  <h2 class="text-center">Update Department</h2>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  {!! Form::open(['url' => '/updatedepartment', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="room">Short Name</label>
      <div class="col-sm-10">
      <input type="hidden" value="{{$deptbyId->id}}" name="id">
     <input type="text" class="form-control" id="room" value="{{$deptbyId->sortname}}" name="sortname">
          <span class="text-danger">{{ $errors->has('sortname') ? $errors->first('sortname') : '' }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Full Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="{{$deptbyId->fullname}}" name="fullname">
       <span class="text-danger">{{ $errors->has('fullname') ? $errors->first('fullname') : '' }}</span>
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Code</label>
      <div class="col-sm-10">          
     <input type="number" class="form-control" id="pwd" value="{{$deptbyId->code}}" name="code">
      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
      </div>
    </div>
  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 text-center">
      <input type="reset" name="reset" class="btn btn-success">
       <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection