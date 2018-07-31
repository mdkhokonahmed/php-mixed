@extends('admin.master')

@section('title')
Add-room
@endsection

@section('content')
   <div class="container">
    <h2 class="text-center">Room-List-View</h2>
    <h2 class="text-center text-success">{{Session::get('message')}}</h2>

     {!! Form::open(['url' => '/search', 'method'=>'GET', 'class' => 'navbar-form navbar-right']) !!}
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      {!! Form::close() !!}
      
    <table class="table table-bordered table-hover">
        <thead>
            
            <tr>
                <th>SL</th>
                <th>Room Number</th>
                <th>Tottal Site</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
              <?php  $count = 1; ?>
              @foreach($rooms as $result)
             
        	<tr>
        		<td>{{$count++}}</td>
        		<td>{{$result->room}}</td>
        		<td>{{$result->site}}</td>
        		<td>{{$result->price}}</td>
        		<td>
        			<a class="btn btn-primary" href="{{url('/edit/room/' .$result->id)}}">
        				 <span class="glyphicon glyphicon-edit"></span>
        			</a>
        				<a onclick="return confirm('Are you sure to Delete!');" class="btn btn-danger" href="{{url('/delete/room/' .$result->id)}}">
        				 <span class="glyphicon glyphicon-trash"></span>
        			</a>

        			</a>
        		</td>
        	</tr>
        	
        	@endforeach
        </tbody>
    </table>
    <div class="pagination-bar text-center">
    {{ $rooms->links() }}
    </div>
  </div>
@endsection