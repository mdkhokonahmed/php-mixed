<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;
use PaginateRoute;

class RoomController extends Controller
{
   public function addroom(){

   	return view('admin.room.roomadd');
   }

   public function StoreRoom(Request $request){
      	$this->validate($request,[
         'room' => 'required',
         'site' => 'required',
         'price' => 'required'
     	],
     	[
     	'room.required' =>'Place Your Room Name!',
     	'site.required' =>'Place Your Tottal sit!',
     	'price.required' =>'Place Your Price!'
     	
     	]);

      $room = new Room;
      $room->room = $request->room;
      $room->site = $request->site;
      $room->price = $request->price;
      $room->save();
      return redirect('/addroom')->with('message', 'Room Added Successfully');

   	
   }

   public function ListRoom(){
     $rooms = DB::table('rooms')
     ->orderBy('id', 'DESC')
     ->paginate(3);
   
   	 return view('admin.room.roomlist', ['rooms'=>$rooms]);
   }

   public function tablesearch(Request $request){
     $search = $request->search;
      $rooms = DB::table('rooms')
     ->Where('room', 'like', '%'.$search.'%')
     ->get();
     return view('admin.room.roomlist', ['rooms'=>$rooms]);

   }

   public function RoomEdit($id){
        $roombyId = DB::table('rooms')
        ->find($id);
   		return view('admin.room.editroom', ['roombyId'=>$roombyId]);
   }

   public function UpdateRoom(Request $request){
   		$this->validate($request,[
         'room' => 'required',
         'site' => 'required',
         'price' => 'required'
     	],
     	[
     	'room.required' =>'Place Your Room Name!',
     	'site.required' =>'Place Your Tottal sit!',
     	'price.required' =>'Place Your Price!'
     	
     	]);
      $room = Room::find($request->id);
      $room->room = $request->room;
      $room->site = $request->site;
      $room->price = $request->price;
      $room->save();

       return redirect('/roomlist')->with('message', 'Room Updated Successfully');
   }

   public function RoomDelete($id){
     DB::table('rooms')
     ->where('id', $id)->delete();
      return redirect('/roomlist')->with('message', 'Room Deleted Successfully');

   }


}
