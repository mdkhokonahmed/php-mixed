@extends('admin.master')

@section('title')
Mail
@endsection

@section('content')
<div class="container">
  <h2 class="text-center">Contact System</h2>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  {!! Form::open(['url' => '/contact', 'method'=>'POST', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="room">Email Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="room" placeholder="Enter Email Address" name="email">
          <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="room">Subject</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="room" placeholder="Enter Subject" name="subject">
          <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</span>
      </div>
    </div>
        <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="8"></textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
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