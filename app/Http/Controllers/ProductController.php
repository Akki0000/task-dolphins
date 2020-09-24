<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use Auth;
use App\User;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = Auth::user()->getId();
        $products = Product::where('user_id',$users)->get();
        // dump($users);

        return view('products.index',compact('products','users'));
    }
    public function create()
    {
        return view('products.add');
    }
    public function save(Request $request)
    {

        
        $save = new Product();
    
        $userId = Auth::user()->getId();

        $save->user_id = $userId;
        $save->title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = rand(11111, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = 'images';
            $upload_success = $request->file('image')->move($destinationPath, $imageName);
            $save->image = $imageName;
        }

        $save->price = $request->price;
        $save->product_sku = $request->product_sku;
        $save->description = $request->description;

        $save->save();

        return redirect()->route('product')->with('status','Product Create Successfully.');

        
    }
    public function show($id)
    {
        $show = Product::findOrFail($id);
        // dump($show);
        return view('products.show',compact('show'));
    }
    public function edit($id)
    {
        $edit = Product::findOrFail($id);
        return view('products.edit',compact('edit'));
    }
    public function update($id,Request $request)
    {

        $product = Product::findOrFail($id);

        $userId = Auth::user()->getId();

        $product->user_id = $userId;
        $product->title = $request->title;


        
        if ($request->hasFile('image')) {
                $uploaded_img = $request->image;
                $imageName = rand(11111, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
                $destinationPath = 'images';
                $upload_success = $uploaded_img->move($destinationPath, $imageName);
                $product->image = $imageName;
            }

        $product->price = $request->price;
        $product->product_sku = $request->product_sku;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('product')->with('status','Product updated Successfully.');


    }
    public function delete($id)
    {
        $delete = Product::findOrFail($id);
        $delete->delete();

        return redirect()->route('product')->with('status','Product Delete Successfully.');
    }
}
