<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){

     return view('pages.category.addcategory');
    }

   public function StoreCategory(Request $request){
     
     $this->validate($request,[
         'categoryName' => 'required'
     	],
     	[
     	'categoryName.required' =>'Filed must be empty!',
     	]);

       $category = new Category;
       $category->categoryName = $request->categoryName;
       $category->publicationStatus = $request->publicationStatus;
       $category->save();
       return redirect('/addcategory')->with('message', 'Category Added successfully');
}

  public function Categorylist(){
     $categorys = Category::all();
  	return view('pages.category.listcategory',['categorys'=>$categorys]);
  }
 
  public function CategoryEdit($id){
     $categoryById = Category::where('id', $id)->first();
  	 return view('pages.category.categoryedit',['categoryById'=>$categoryById]);
  }

  public function UpdateCategory(Request $request){
  	$this->validate($request,[
         'categoryName' => 'required'
     	],
     	[
     	'categoryName.required' =>'Filed must be empty!',
     	]);
        
       $category = Category::find($request->id);
       $category->categoryName = $request->categoryName;
       $category->publicationStatus = $request->publicationStatus;
       $category->save();
       return redirect('/listcategory')->with('message', 'Category Updated successfully');

  }

  public function DeleteCategory($id){
  	$category = Category::find($id);
  	$category->delete();
  	return redirect('/listcategory')->with('message', 'Category Deleted successfully');
  }








}
