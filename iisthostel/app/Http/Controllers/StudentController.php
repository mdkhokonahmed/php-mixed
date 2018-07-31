<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;

class StudentController extends Controller
{
   public function addstudent(){
      $rooms = DB::table('rooms')->select('id', 'id', 'room', 'room')->get();
      $department = DB::table('departments')->select('id', 'id', 'fullname', 'fullname')->get();

   	return view('admin.student.addstudent',['rooms'=>$rooms, 'department' => $department] );
   }

   public function storeStudent(Request $request){

   	 $this->validate($request,[
         'seater' => 'required',
         'feesmonth' => 'required',
         'stdname' => 'required',
         'rool'   => 'required'
     	],
     	[
     	'seater.required' =>'Place Your seater!',
     	'fullname.required' =>'Place Your feesmonth!',
     	'stdname.required' =>'Place Your  Student Name!',
     	'rool.required' =>'Place Your  Student Roll!'
     	
     	]);

    	 DB::table('students')->insert([
    	 	'roomid' => $request->roomid,
    	 	'seater' => $request->seater,
    	 	'feesmonth' => $request->feesmonth,
    	 	'departmentid' => $request->departmentid,
    	 	'stdname' => $request->stdname,
    	 	'rool' => $request->rool,
    	 	'gender' => $request->gender,
    	 	'contact' => $request->contact,
    	 	'emrcontact' => $request->emrcontact,
    	 	'garname' => $request->garname,
    	 	'garcontact' => $request->garcontact,
    	 	'address' => $request->address,
    	 	'city' => $request->city,
    	 	'state' => $request->state,

    	 	]);

    	 return redirect('/addstudent')->with('message', 'Student Registetion Successfully');
   }

   public function studentList(){
     $students = DB::table('students')
            ->join('rooms', 'students.roomid', '=', 'rooms.id')
            ->join('departments', 'students.departmentid', '=', 'departments.id')
            ->select('students.*', 'rooms.room', 'departments.fullname')
            ->get();
   	return view('admin.student.studentlist', ['students'=>$students]);
   }

   public function studentEdit($id){
      $rooms = DB::table('rooms')->select('id', 'id', 'room', 'room')->get();
      $department = DB::table('departments')->select('id', 'id', 'fullname', 'fullname')->get();
      $students   = Student::Where('id', $id)->first();
   	return view('admin.student.editstudent',['rooms'=>$rooms, 'department' => $department ,'students'=>$students]);
   
   }

   public function studentupdated(Request $request){
   	 $this->validate($request,[
         'seater' => 'required',
         'feesmonth' => 'required',
         'stdname' => 'required',
         'rool'   => 'required'
     	],
     	[
     	'seater.required' =>'Place Your seater!',
     	'fullname.required' =>'Place Your feesmonth!',
     	'stdname.required' =>'Place Your  Student Name!',
     	'rool.required' =>'Place Your  Student Roll!'
     	
     	]);

   	       $student = Student::find($request->id);
   	        $student->roomid = $request->roomid;
    	 	$student->seater = $request->seater;
    	 	$student->feesmonth= $request->feesmonth;
    	 	$student->departmentid = $request->departmentid;
    	 	$student->stdname = $request->stdname;
    	 	$student->rool = $request->rool;
    	 	$student->gender = $request->gender;
    	 	$student->contact = $request->contact;
    	 	$student->emrcontact =$request->emrcontact;
    	 	$student->garname = $request->garname;
    	 	$student->garcontact = $request->garcontact;
    	 	$student->address = $request->address;
    	 	$student->city = $request->city;
    	 	$student->state = $request->state;
    	 	$student->save();
  return redirect('/studenttlist')->with('message', 'Student Registetion Updated');
   }

   public function studentDelete($id){
   DB::table('students')
     ->where('id', $id)->delete();
      return redirect('/studenttlist')->with('message', 'Student Registetion Deleted Successfully');
   }


}
