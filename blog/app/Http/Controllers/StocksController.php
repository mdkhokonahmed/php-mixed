<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Supplier;
use App\Stock;
use DB;

class StocksController extends Controller
{
   public function index(){
     $categorys = Category::where('publicationStatus', 1)->get();
     $brands    = Brand::where('publicationStatus', 1)->get();
   	return view('pages.stocks.addstock', ['categorys'=>$categorys,'brands'=>$brands]);
   }

   public function StoreStocks(Request $request){
    
    	$this->validate($request,[
         'productName' => 'required',
     	],
     	[
     	'productName.required' =>'Place Your Product Name!',
     	]);
        $stock = new Stock();
        $stock->productName = $request->productName;
        $stock->categoryId = $request->categoryId;
        $stock->brindId =  $request->brindId;
        $stock->buyingrate = $request->buyingrate;
        $stock->sellingrat = $request->sellingrat;
        $stock->quantity = $request->quantity;
        $stock->save();
       return redirect('/addstock')->with('message', 'Product Added successfully');	

   }

   public function StockList(){
      $stocks = DB::table('stocks')
            ->join('categories', 'stocks.categoryId', '=', 'categories.id')
            ->join('brands', 'stocks.brindId', '=', 'brands.id')
            ->select('stocks.*', 'categories.categoryName', 'brands.brandName')
            ->paginate(2);     
   	 return view('pages.stocks.liststock',['stocks'=>$stocks]);
   }

   public function StockEdit($id){
     $categorys =  Category::where('publicationStatus', 1)->get();
     $brands    =  Brand::where('publicationStatus', 1)->get();
     $stocksById = Stock::where('id',$id)->first();
   	return view('pages.stocks.editstock',['categorys'=>$categorys,'brands'=>$brands,'stocksById'=>$stocksById]);
   }

   public function UpdateStock(Request $request){
   		$this->validate($request,[
         'productName' => 'required',
     	],
     	[
     	'productName.required' =>'Place Your Product Name!',
     	]);

     	  $stock = Stock::find($request->id);
        $stock->productName = $request->productName;
        $stock->categoryId = $request->categoryId;
        $stock->brindId =  $request->brindId;
        $stock->buyingrate = $request->buyingrate;
        $stock->sellingrat = $request->sellingrat;
        $stock->quantity = $request->quantity;
        $stock->save();
       return redirect('/liststock')->with('message', 'Product Updated successfully');
   }

  public function DeleteStock($id){
  	$stock = Stock::find($id);
  	$stock->delete();
  	return redirect('/liststock')->with('message', 'Product Deleted successfully');
  }

 




}
