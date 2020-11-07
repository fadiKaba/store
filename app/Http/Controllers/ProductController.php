<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;

class ProductController extends Controller
{   

    public function index(){
        $products = Product::with('category')->get();
        return $products;
    }

    public function store(Request $request){

        $request->validate([
            'product_name' => 'required|max:50',
            'product_image' => 'mimes:jpeg,jpg,png|max:10000',
            'product_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'product_category' => 'required|exists:categories,category_id',
            'product_company' => 'required|exists:companies,company_id',
            'product_availability' => 'required|integer|min:0|max:1',
            'product_quantity' => 'required|integer',
            'product_description' => ''

        ]);
        
        $product = new Product();

        if($request->file('product_image') != null){
            $file = $request->file('product_image');
            $path = $file->getPath();
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();       
            $newName = time().uniqid().'.jpg';

            $img = Image::make($file);
            $img->encode('jpg', 75)->fit(400, 600)->save('./images/products/'.$newName, 80);
            $product->product_img = $newName;
        }
       
        $product->product_name = $request->product_name;       
        $product->product_price = $request->product_price;
        $product->category_id = $request->product_category;
        $product->company_id = $request->product_company;
        $product->product_availability = $request->product_availability;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->save();
        
        return redirect()->back()->with('success', $product->product_name .' added successfully');
       
    }
}
