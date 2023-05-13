<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection\paginate;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /*public function index()
    {
        $data = Product::select('products.*', 'categories.catName')
            ->join('categories','products.catID','=','categories.catID')
            ->get();
        return view('index', compact('data'));
    }

    public function add()
    {
        $category = Category::get();
        return view('add', compact('category'));
    }

    public function save(Request $request)
    {
        $pro = new Product();
        $pro->productID = $request->id;
        $pro->productName = $request->name;
        $pro->productPrice = $request->price;
        $pro->productImage = $request->image;
        $pro->productDetails = $request->details;
        $pro->catID = $request->category;
        $pro->save();
        return redirect()->back()->with('success','Product added successfully!');
    }

    public function edit($id)
    {
        $data = Product::where('productID', '=', $id)->first();
        $category = Category::get();
        return view('edit', compact('data','category'));
    }

    public function update(Request $request)
    {
        Product::where('productID', '=', $request->id)->update([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productImage' => $request->image,
            'productDetails' => $request->details,
            'catID' => $request->category
        ]);
        return redirect()->back()->with('success','Product update successfully!');
    }

    public function delete($id)
    {
        $data = Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success','Product deleted successfully!');
    }*/

    
    public function products()
    {
        $products = Product::select('products.*', 'categories.catName')
        ->join('categories', 'products.catID', '=', 'categories.catID')
        ->where('productID', $id)
        ->paginate(10);
        $category = Category::all();
        return view('customers.products', compact('products', 'category'));
    }

    public function productsAdmin()
    {
        $data = Product::select('products.*', 'categories.catName')
        ->join('categories', 'products.catID', '=', 'categories.catID')
        ->get();
        return view('admin.products', compact('data'));
    }

    public function productDetail($id)
    {
        $product = Product::select('products.*', 'categories.catName')
                            ->join('categories', 'products.catID', '=', 'categories.catID')
                            ->where('productID', $id)
                            ->get();
        $category = Category::all();
        return view('customers.productDetail', compact('product','category'));
    }
}

