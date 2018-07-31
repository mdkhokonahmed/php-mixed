@extends('pages.master')

@section('title')
Brands-List
@endsection

@section('homecontent')
 <h3 class="text-center">Brand-List</h3>
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<hr/>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Brand Description</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr> 
            <th scope="row">{{$brand->id}}</th>
            <td>{{$brand->brandName}}</td>
            <td>{{$brand->BrandDescription}}</td>
            <td>{{ $brand->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td> 
            <td>
                <a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{ url('/brand/delete/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
