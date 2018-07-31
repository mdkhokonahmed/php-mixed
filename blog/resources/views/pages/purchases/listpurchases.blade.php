@extends('pages.master')

@section('title')
Purchases-List
@endsection

@section('homecontent')
 <h3 class="text-center">View Purchases Details</h3>
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<hr/>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Supplier Nane</th>
            <th>Category Name</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Balance</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Purchases as $Purchase)
        <tr> 
            <th scope="row">{{$Purchase->id}}</th>
            <td>{{$Purchase->supplier}}</td>
            <td>{{$Purchase->name}}</td> 
            <td>{{$Purchase->quantity}}</td>
            <td>{{$Purchase->total}}</td>
            <td>{{$Purchase->payment}}</td>
            <td>{{$Purchase->balance}}</td>
            
            <td>
                <a href="{{ url('/Purchase/edit/'.$Purchase->id) }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{ url('/Purchase/delete/'.$Purchase->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>

{{$Purchases->links()}}


@endsection
