@extends('pages.master')

@section('title')
Update-Brand
@endsection

@section('homecontent')
  <h3 class="text-center">Brand Update Details</h3>
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <hr/>
        <div class="well">
            {!! Form::open( [ 'url'=>'/brand/update', 'method' =>'POST', 'class' =>'form-horizontal', 'name'=>'editCategoryForm' ] ) !!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" value="{{$brandById->id}}">
                    <input type="text" class="form-control" name="brandName" value="{{$brandById->brandName}}">
                    <span class="text-danger">{{ $errors->has('brandName') ? $errors->first('brandName') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Brand Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="BrandDescription" rows="8">{{$brandById->BrandDescription}}</textarea>
                    <span class="text-danger">{{ $errors->has('BrandDescription') ? $errors->first('BrandDescription') : '' }}</span>
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
                    <button type="submit" name="btn" class="btn btn-success btn-block">Update Brand Info</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
document.forms['editCategoryForm'].elements['publicationStatus'].value={{$brandById->publicationStatus }}
</script>

@endsection


