<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection\paginate;

class CustomerController extends Controller
{
    public function index() {
        $products = Product::select('products.*', 'categories.catName')
        ->join('categories', 'products.catID', '=', 'categories.catID')
        ->paginate(10);
        $category = Category::all();
        return view('customers.index', compact('products','category'));
    }

    public function register()
    {
        return view('customers.register');
    }

    public function login()
    {
        return view('customers.login');
    }

    public function registerProcess(Request $request)
    {
        $cus = new Customer();
        $cus->customerEmail = $request->email;
        $cus->customerPass = Hash::make($request->pass);
        $cus->customerName = $request->name;
        $cus->customerAddress = $request->address;
        $cus->customerPhone = $request->phone;
        $cus->customerPhoto = $request->photo;
        $cus->save();
        return redirect('customers/login');
    }

    public function loginProcess(Request $request)
    {
        $cus = Customer::where('customerEmail', '=', $request->customerEmail)->first();
        if($cus) {
            if(Hash::check($request->customerPass, $cus->customerPass)) {
                $request->session()->put('customerEmail', $cus->customerEmail);
                $request->session()->put('customerPass', $cus->customerPass);
                $request->session()->put('customerName', $cus->customerName);
                return redirect('customers/index');
            } else {
                return back()->with('fail', 'Password is not matched!');
            }
        } else {
            return back()->with('fail', 'The email is not registered!');
        }
    }

    public function logout()
    {
        Session::pull('customerEmail');
        Session::pull('customerPass');
        Session::pull('customerName');
        return redirect('customers/index');
    }
}
