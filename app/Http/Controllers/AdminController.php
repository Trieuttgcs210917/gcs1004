<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;

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

    public function admins()
    {
        $data = Admin::all();
        return view('admin.admins', compact('data'));
    }

    public function addAdmin()
    {
        return view('admin/addAdmin');
    }

    public function saveAdmin(Request $request)
    {
        $pro = new Admin();
        $pro->adminID = $request->id;
        $pro->adminPass = $request->pass;
        $pro->adminPhoto = $request->photo;
        $pro->adminFullname = $request->name;
        $pro->save();
        return redirect('admin/admins')->with('success','Admin added successfully!');
    }

    public function editAdmin($id)
    {
        $eAdm = Admin::where('adminID', $id)->first();
        return view('admin/editAdmin', compact('eAdm'));
    }

    public function updateAdmin(Request $request)
    {
        Admin::where('adminID', '=', $request->id)->update([
            'adminPass' => $request->pass,
            'adminPhoto' => $request->photo,
            'adminFullname' => $request->name,
        ]);
        return redirect('admin/admins')->with('success','Admin update successfully!');
    }
    
    public function deleteAdmin($id)
    {
        $dAdm = Admin::where('adminID', '=', $id)->delete();
        return redirect('admin/admins')->with('success','Admin deleted successfully!');
    }

    public function customers()
    {
        $data = Customer::all();
        return view('admin.customers', compact('data'));
    }

    public function addCustomer()
    {
        return view('admin/addCustomer');
    }

    public function saveCustomer(Request $request)
    {
        $pro = new Customer();
        $pro->customerEmail = $request->email;
        $pro->customerName = $request->name;
        $pro->customerPass = Hash::make($request->pass);
        $pro->customerPhoto = $request->photo;
        $pro->customerAddress = $request->address;
        $pro->customerPhone = $request->phone;
        $pro->save();
        return redirect('admin/customers')->with('success','Customer added successfully!');
    }

    public function editCustomer($id)
    {
        $eCus = Customer::where('customerEmail', $id)->first();
        return view('admin/editCustomer', compact('eCus'));
    }

    public function updateCustomer(Request $request)
    {
        Customer::where('customerEmail', '=', $request->email)->update([
            'customerName' => $request->name,
            'customerPass' => $request->pass,
            'customerPhoto' => $request->photo,
            'customerAddress' => $request->address,
            'customerPhone' => $request->phone
        ]);
        return redirect('admin/customers')->with('success','Customer update successfully!');
    }
    
    public function deleteCustomer($id)
    {
        $dCus = Customer::where('customerEmail', '=', $id)->delete();
        return redirect('admin/customers')->with('success','Customer deleted successfully!');
    }

    public function categories()
    {
        $data = Category::all();
        return view('admin/categories', compact('data'));
    }

    public function addcategory()
    {
        return view('admin/addCategory');
    }

    public function saveCategory(Request $request)
    {
        $pro = new Category();
        $pro->catID = $request->id;
        $pro->catName = $request->name;
        $pro->catDescriptions = $request->description;
        $pro->save();
        return redirect('admin/categories')->with('success','Category added successfully!');
    }

    public function editCategory($id)
    {
        $eCus = Category::where('catID', $id)->first();
        return view('admin/editCategory', compact('eCus'));
    }

    public function updateCategory(Request $request)
    {
        Category::where('catID', '=', $request->id)->update([
            'catName' => $request->name,
            'catDescriptions' => $request->description,
        ]);
        return redirect('admin/categories')->with('success','Category update successfully!');
    }
    
    public function deleteCategory($id)
    {
        $dCus = Category::where('catID', '=', $id)->delete();
        return redirect('admin/categories')->with('success','category deleted successfully!');
    }
}
