@extends('admin.master')

@section('title')
update-room
@endsection

@section('content')
<div class="container">
  <h2 class="text-center">Update Room</h2>
  {!! Form::open(['url' => '/update/room', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="room">Room Number</label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control" id="room" value="{{$roombyId->id}}" name="id">
        <input type="text" class="form-control" id="room" value="{{$roombyId->room}}" name="room">
          <span class="text-danger">{{ $errors->has('room') ? $errors->first('room') : '' }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Tottal Sit</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="{{$roombyId->site}}" name="site">
       <span class="text-danger">{{ $errors->has('site') ? $errors->first('site') : '' }}</span>
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Price</label>
      <div class="col-sm-10">          
     <input type="number" class="form-control" id="pwd" value="{{$roombyId->price}}" name="price">
      <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
      </div>
    </div>
  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 text-center">
       <input type="submit" name="submit" value="Update" class="btn btn-primary">
      </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection