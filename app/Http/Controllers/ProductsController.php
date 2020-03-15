<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\products; //call the model that is located inside the App folder 

use App\productCategory;
use App\ProductName; 
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // sum of product
        
        $product = products::get(); //data is paginated
        
        foreach( $product as $product){
        $id = $product->id;
        $totalBato = productCategory::where('name', $id)->sum('quantity');
        }
        

        $products = products::orderby('created_at','desc')->get(); //data is paginated

        return view('products.index')->with('products', $products)->with('totalBato',$totalBato); //return the variable that has the data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productName =  ProductName::get();
        return view('products.create')->with('productName',$productName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'unique:products|required',
            'amount'=> 'required',
         
        ]);
            
        // HANDLE FILE UPLOAD
        if($request->hasFile('image')){

            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            //get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jfif';

        }
            
        // return 123;

        $post = new products;
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->amount = $request->input('amount');
        $post->quantity = $request->input('quantity');
        $post->image = $fileNameToStore;
        $post->save();

        return redirect('/products')->with('message', 'post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = products::find($id);  //assign all the dataa in the table in a variable(this process is using eloquent)
        return view('products.show')->with('products' , $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::find($id);  //assign all the dataa in the table in a variable(this process is using eloquent)
        $productName =  productCategory::get();
      
        return view('products.edit')->with('product' , $product)->with('productName',$productName);
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
       

        $product = products::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
     
        
        $product->save();


        return redirect('/products')->with('message', 'product successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::find($id);
        
        if(auth()->user()->userType != 'admin'){
            return redirect('/products')->with('message','Unautorized Page');
        }

        if($product->image != 'noimage.jfif'){
            Storage::delete('public/images/'.$product->image);
        }
        $product->delete();
        return redirect('/products')->with('message', 'post successfully deleted');
    }



    public function addQuantity($id){


        $product = products::find($id);
        return view('productName.create')->with('product' , $product);
    }

    public function StoreQuantity(Request $request, $id){

      
        $product = products::find($id);

        $productName = new productCategory;
        $productName->name = $product;
        $productName->quantity = $request->input('quantity');
        $productName->save();
        
        $product->save();


        return redirect('/products')->with('message', 'product successfully updated');
    }
}
