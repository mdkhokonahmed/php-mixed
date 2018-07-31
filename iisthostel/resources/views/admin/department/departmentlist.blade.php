@extends('admin.master')

@section('title')
Add-room
@endsection

@section('content')
   <div class="container">
    <h2 class="text-center">Room-List-View</h2>
    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    <table class="table table-bordered table-hover">
        <thead>
            
            <tr>
                <th>SL</th>
                <th>Department Short Name</th>
                <th>Department Full Name</th>
                <th>Department Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
              <?php  $count = 1; ?>
              @foreach($departments as $result)
             
        	<tr>
        		<td>{{$count++}}</td>
        		<td>{{$result->sortname}}</td>
        		<td>{{$result->fullname}}</td>
        		<td>{{$result->code}}</td>
        		<td>
        			<a class="btn btn-primary" href="{{url('/edit/department/' .$result->id)}}">
        				 <span class="glyphicon glyphicon-edit"></span>
        			</a>
        				<a onclick="return confirm('Are you sure to Delete!');" class="btn btn-danger" href="{{url('/delete/department/' .$result->id)}}">
        				 <span class="glyphicon glyphicon-trash"></span>
        			</a>

        			</a>
        		</td>
        	</tr>
        	
        	@endforeach
        </tbody>
    </table>
  </div>
@endsection