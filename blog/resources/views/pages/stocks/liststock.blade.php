@extends('pages.master')

@section('title')
stock-List
@endsection

@section('homecontent')
 <h3 class="text-center">View Stock Details</h3>
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
{!! Form::open( [ 'url'=>'', 'method' =>'GET', 'class' =>'navbar-form navbar-right','role'=>'search' ] ) !!}
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
     {!! Form::close() !!}


      <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Nane</th>
            <th>Category Name</th>
            <th>Brand Name</th>
            <th>Buying Rate</th>
            <th>Selling Rate</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr> 
            <th scope="row">{{$stock->id}}</th>
            <td>{{$stock->productName}}</td>
            <td>{{$stock->categoryName}}</td> 
            <td>{{$stock->brandName}}</td>
            <td>{{$stock->buyingrate}}</td>
            <td>{{$stock->sellingrat}}</td>
            <td>{{$stock->quantity}}</td>
            
            <td>
                <a href="{{ url('/stock/edit/'.$stock->id) }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{ url('/stock/delete/'.$stock->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
{{$stocks->links()}}



@endsection
