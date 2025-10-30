<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index() {

        // check if user is authenticated or not
        if(Auth::check() && Auth::user()->user_type == 'user'){
                return view('dashboard');
        }else if(Auth::check() && Auth::user()->user_type == 'admin'){
                return view('admin.dashboard');
        }
    }

    public function home() {

        $Latest_products = Product::latest()->take(8)->get();

        $data = [
            'Latest_products' => $Latest_products,
        ];

        return view('Front.index',$data);
    }

    public function view_all_products(){
        $all_products = Product::all();

        $data = [
            'all_products' => $all_products
        ];

        return view('Front.all_products',$data);
    }

    public function product_details($product_id){
        $product_details = Product::findOrFail($product_id);

        $data = [
            'product' => $product_details
        ];

        return view('Front.product_details',$data);
    }
} 
