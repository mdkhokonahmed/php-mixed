<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Department;

class DepartmentController extends Controller
{
    public function adddepartment(){

      return view('admin.department.adddepartment');
    }

    public function storeDepartment(Request $request){

    	 $this->validate($request,[
         'sortname' => 'required',
         'fullname' => 'required',
         'code' => 'required'
     	],
     	[
     	'sortname.required' =>'Place Your Department Short Name!',
     	'fullname.required' =>'Place Your Department Full Name!',
     	'code.required' =>'Place Your Department Code!'
     	
     	]);

    	 DB::table('departments')->insert([
    	 	'sortname' => $request->sortname,
    	 	'fullname' => $request->fullname,
    	 	'code' => $request->code,
    	 	]);

    	 return redirect('/adddepartment')->with('message', 'Department Added Successfully');
    }

    public function departmentlist(){
      $departments = DB::table('departments')
                    ->orderBy('id', 'DESC')
                    ->get();
     return view('admin.department.departmentlist', ['departments'=>$departments]);	
    }

    public function departmentEdit($id){
    	$deptbyId = DB::table('departments')
        ->find($id);
       return view('admin.department.departmentedit', ['deptbyId'=>$deptbyId]);	  
    }
    
    public function UpdateDepartment(Request $request){

    	$this->validate($request,[
         'sortname' => 'required',
         'fullname' => 'required',
         'code' => 'required'
     	],
     	[
     	'sortname.required' =>'Place Your Department Short Name!',
     	'fullname.required' =>'Place Your Department Full Name!',
     	'code.required' =>'Place Your Department Code!'
     	
     	]);

      $department = Department::find($request->id);
      $department->sortname = $request->sortname;
      $department->fullname = $request->fullname;
      $department->code = $request->code;
      $department->save();
      return redirect('/departmentlist')->with('message', 'Department Updated Successfully');
    }

    public function departmentDelete($id){
    	DB::table('departments')
    	    ->Where('id', $id)->delete();
    	return redirect('/departmentlist')->with('message', 'Department Deleted Successfully');
    }

}

