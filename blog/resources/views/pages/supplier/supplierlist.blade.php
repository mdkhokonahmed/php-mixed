@extends('pages.master')

@section('title')
Suppliers-List
@endsection

@section('homecontent')
 <h3 class="text-center">Suppliers List</h3>
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<hr/>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
        <tr> 
            <th scope="row">{{$supplier->id}}</th>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->address}}</td> 
            <td>{{$supplier->phone}}</td>
            <td>{{$supplier->email}}</td>
            <td>{{$supplier->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
            <td>
                <a href="{{ url('/supplier/edit/'.$supplier->id) }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{ url('/supplier/delete/'.$supplier->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
