@extends('pages.master')

@section('title')
Add-Category
@endsection

@section('homecontent')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success"></h3>
        <hr/>
        <div class="well">
            {!! Form::open( [ 'url'=>'/coustomar/update', 'method' =>'POST', 'class' =>'form-horizontal' ] ) !!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="hidden"  name="id" value="{{$coustomarById->id}}">
                    <input type="text" class="form-control" name="name" value="{{$coustomarById->name}}">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
            </div>

           <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="8">{{$coustomarById->address}}</textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" value="{{$coustomarById->phone}}">
                    <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="eamil" value="{{$coustomarById->eamil}}">
                    <span class="text-danger">{{ $errors->has('eamil') ? $errors->first('eamil') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block">Save Coustomar Info</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection


