<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productCategory; //call the model that is located inside the App folder 
use App\products;
use App\CartTable;
use Auth;
use DB;
class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productName = productCategory::orderby('name','asc'); //data is paginated
        
        return view('productName.index')->with('productName', $productName); //return the variable that has the data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products =  products::get();
        return view('productName.create')->with('products', $products);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::where('id', $id)->get();
        $pluck = $product->pluck('name');
        $productName = new productCategory;
        $productName->name = $id;
        $productName->quantity = $request->input('quantity');
        $productName->save();
        
        
        
        return redirect('/products')->with('message', 'product successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = CartTable::find($id);
        $order->delete();
          //create success message
          session()->flash('notif','Product Removed');
        return redirect('my/cart')->with('message', 'post successfully deleted');
    }

    public function add_to_cart( $id ){
        

        $skips = ["[","]","\""];
        $productName = products::where('id', $id)->get();
        $pluck = str_replace($skips, ' ',$productName->pluck('name'));
        $userID = Auth::user()->id;

        $productName = new CartTable;
        $productName->product_id = $id;
        $productName->product_name = $pluck;
        $productName->user_id = $userID;
        $productName->save();
        
        //create success message
        session()->flash('notif','Product Successfully Added to cart');
        
        return redirect('/products')->with('message', 'product successfully added');

    }

    public function view_cart(){
        $userID = Auth::user()->id;
        $user_order = cartTable::where('user_id', $userID)->get();

        // $user_order =  DB::table('products')
        // ->join('cart_tables', 'cart_tables.product_id','products.id')
        // ->select('cart_tables.*')
        // ->where('user_id',$userID)
        // ->get();

        return view('products.show')->with('user_order',$user_order);
        
    }

    public function orders(){
        return view('products.order');
    }
}
