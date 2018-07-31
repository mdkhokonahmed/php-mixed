@extends('pages.master')

@section('title')
Update-Suppliers
@endsection

@section('homecontent')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success"></h3>
        <hr/>
        <div class="well">
            {!! Form::open( [ 'url'=>'/supplier/update', 'method' =>'POST', 'class' =>'form-horizontal', 'name'=>'editCategoryForm' ] ) !!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="hidden"  name="id" value="{{$supplierById->id}}">
                    <input type="text" class="form-control" name="name" value="{{$supplierById->name}}">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
            </div>

           <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="8">{{$supplierById->address}}</textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" value="{{$supplierById->phone}}">
                    <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{$supplierById->email}}">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="publicationStatus">
                        <option>Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option> 
                    </select>
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
<script>
document.forms['editCategoryForm'].elements['publicationStatus'].value={{$supplierById->publicationStatus }}
    </script>
@endsection


