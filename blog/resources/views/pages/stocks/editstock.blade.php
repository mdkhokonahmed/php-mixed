@extends('pages.master')

@section('title')
Update-Stocks
@endsection

@section('homecontent')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <hr/>
        <div class="well">
            {!! Form::open( [ 'url'=>'/update/stock', 'method' =>'POST', 'class' =>'form-horizontal', 'name'=>'editCategoryForm' ] ) !!}
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" value="{{$stocksById->id}}">
                    <input type="text" class="form-control" name="productName" value="{{$stocksById->productName}}">
                    <span class="text-danger">{{ $errors->has('productName') ? $errors->first('productName') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"> Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoryId">
                        <option>Select your Category</option>
                         @foreach($categorys as $category)
                        <option value="1">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"> Brand Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="brindId">
                        <option>Select your Brand</option>
                          @foreach($brands as $brand)
                        <option value="1">{{$brand->brandName}}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Buying Rate</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="buyingrate" value="{{$stocksById->buyingrate}}">
                    <span class="text-danger">{{ $errors->has('buyingrate') ? $errors->first('buyingrate') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Selling Rate</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sellingrat" value="{{$stocksById->sellingrat}}">
                    <span class="text-danger">{{ $errors->has('sellingrat') ? $errors->first('sellingrat') : '' }}</span>
                </div>
            </div>
             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantity" value="{{$stocksById->quantity}}">
                    <span class="text-danger">{{ $errors->has('quantity') ? $errors->first('quantity') : '' }}</span>
                </div>
            </div>
              
            <div class="form-group text-center">
        <button type="submit" name="Submit" class="btn btn-primary">Update</button>
        <button type="reset" name="Reset" value="Reset" class="btn btn-primary">Reset </button>
        </div>
         {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
document.forms['editCategoryForm'].elements['categoryId'].value={{$stocksById->categoryId }}
    </script>
    <script>
document.forms['editCategoryForm'].elements['brindId'].value={{$stocksById->brindId }}
    </script>
@endsection


