@extends('admin.master')

@section('title')
Add-room
@endsection

@section('content')

    <h2 class="text-center">Student-List-View</h2>
    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    <table class="table table-bordered table-hover">
        <thead>
            
            <tr>
                <th>SL</th>
                <th>Room No</th>
                <th>Seater</th>
                <th>Fees Per Month</th>
                <th>Department</th>
                <th>Name</th>
                <th>Roll/ID</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Emergency Contact</th>
                <th>Guardian Name</th>
                <th>Guardian Contact</th>
                <th>Address</th>
                <th>City</th>
                 <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
              <?php  $count = 1; ?>
              @foreach($students as $result)
             
        	<tr>
        		<td>{{$count++}}</td>
        		<td>{{$result->room}}</td>
        		<td>{{$result->seater}}</td>
        		<td>{{$result->feesmonth}}</td>
                <td>{{$result->fullname}}</td>
                <td>{{$result->stdname}}</td>
                <td>{{$result->rool}}</td>
                <td>{{$result->gender}}</td>
                <td>{{$result->contact}}</td>
                <td>{{$result->emrcontact}}</td>
                <td>{{$result->garname}}</td>
                <td>{{$result->garcontact}}</td>
                <td>{{$result->address}}</td>
                <td>{{$result->city}}</td>
                <td>{{$result->state}}</td>
        		<td>
        			<a  href="{{url('/edit/student/' .$result->id)}}">
        				<i class="fa fa-edit"></i>
        			</a>
        				<a onclick="return confirm('Are you sure to Delete!');" href="{{url('/delete/student/' .$result->id)}}">
        				 <i class="fa fa-trash"></i>
        			</a>

        			</a>
        		</td>
        	</tr>
        	
        	@endforeach
        </tbody>
    </table>

@endsection