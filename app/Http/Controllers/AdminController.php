<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $admin = Admin::where('adminID', '=', $request->adminID)->first();
        if($admin){
            if($admin->adminPass == $request->adminPass) {
                $request->session()->put('adminID', $admin->adminID);
                $request->session()->put('adminPhoto', $admin->adminPhoto);
                $request->session()->put('adminFullname', $admin->adminFullname);
                return redirect('admin/index');
            } else {
                return back()->with('fail', 'Password is not match!');
            }
        } else {
            return back()->with('fail', 'Admin id is not existed!');
        }
    }

    public function logout()
    {
        if(Session::has('adminID'))
            Session::pull('adminID');
        if(Session::has('adminPhoto'))
            Session::pull('adminPhoto');
        if(Session::has('adminFullname'))
            Session::pull('adminFullname');
        return redirect('admin/login');
    }

    public function add()
    {
        $category = Category::get();
        return view('admin/add', compact('category'));
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
        return view('admin/edit', compact('data','category'));
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
    }
}
