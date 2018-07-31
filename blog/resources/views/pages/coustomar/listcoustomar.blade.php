@extends('pages.master')

@section('title')
Category-List
@endsection

@section('homecontent')
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<table class="table table-bordered table-hover" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coustomars as $coustomar)
        <tr> 
            <th scope="row">{{$coustomar->id}}</th>
            <td>{{$coustomar->name}}</td>
            <td>{{$coustomar->address}}</td> 
            <td>{{$coustomar->phone}}</td>
            <td>{{$coustomar->eamil}}</td>
            <td>
                <a href="{{ url('/coustomar/edit/'.$coustomar->id) }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{ url('/coustomar/delete/'.$coustomar->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
{{ $coustomars->links() }}

<script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

@endsection
