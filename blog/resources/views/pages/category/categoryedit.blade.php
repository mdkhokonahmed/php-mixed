@extends('pages.master')

@section('title')
Update-Category
@endsection

@section('homecontent')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success"></h3>
        <hr/>
        <div class="well">
            {!! Form::open( [ 'url'=>'/category/update', 'method' =>'POST', 'class' =>'form-horizontal', 'name'=>'editCategoryForm'] ) !!}

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" value="{{$categoryById->id}}">
                    <input type="text" class="form-control" name="categoryName" value="{{$categoryById->categoryName}}">
                    <span class="text-danger">{{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}</span>
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
                    <button type="submit" name="btn" class="btn btn-success btn-block">Update  Category Info</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
document.forms['editCategoryForm'].elements['publicationStatus'].value={{ $categoryById->publicationStatus }}
</script>
@endsection


