@extends('admin.master')

@section('title')
Add-room
@endsection

@section('content')
<div class="container">
  <h2 class="text-center">Add Room</h2>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  {!! Form::open(['url' => '/saveroom', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="room">Room Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="room" placeholder="Enter Room number" name="room">
          <span class="text-danger">{{ $errors->has('room') ? $errors->first('room') : '' }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Tottal Sit</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Sit" name="site">
       <span class="text-danger">{{ $errors->has('site') ? $errors->first('site') : '' }}</span>
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Price</label>
      <div class="col-sm-10">          
     <input type="number" class="form-control" id="pwd" placeholder="Enter Price" name="price">
      <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
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