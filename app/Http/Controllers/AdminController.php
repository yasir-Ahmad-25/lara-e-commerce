<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    ##################  CATEGORIES SECTION [ START ] ################
    public function add_category(){
        return view('admin.categories.add_category');
    }

    public function post_category(Request $request){
        $category = new Category();
        $category_name = $request->category_name;
        $postedData = [
            'category_name' => $category_name
        ];
        $category->create($postedData);
        return redirect()->back()->with('message','Category Saved Successfully');
    }

    public function view_categories(){
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view('admin.categories.view_categories',$data);
    }

    public function edit_category($category_id){

        $category_data = Category::findOrFail($category_id);

        $data = [
            'category' => $category_data
        ];

        return view('admin.categories.edit_category',$data);
    }

    public function update_category(Request $request,$category_id){
        $category = new Category();

        $category_name = $request->category_name;

        $upate_data = [
            'category_name' => $category_name
        ];

        $current_category = $category::find($category_id);
        if($current_category){
            if ($current_category->update($upate_data)) {
                return redirect()->back()->with('message','Category Updated Successfully');
            } else {
                return redirect()->back()->with('error','Failed To Update Category Name. Please Try Again...');
            }
        }

    }

    public function delete_category($category_id){

        $category = Category::findOrFail($category_id);

        if($category){
            $category->delete();
            return redirect()->back()->with('message','Category Has Been Deleted Successfully');
        }
        
        return redirect()->back()->with('error','Failed To Delete Category. Please Try Again...');

    }

    ##################  CATEGORIES SECTION [ END ] ################


    ################  PRODUCTS SECTION [ START ] ##############
    public function add_product(){
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view('admin.products.add_product',$data);
    }

    public function create_product(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'nullable',
            'product_qty' => 'required|integer',
            'product_price' => 'required|numeric',
            'product_category' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $postedData = [
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'category_id' => $request->product_category,
        ];

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);  // ✅ Save to public/products
            $postedData['product_image'] = $imageName;
        }

        $save_product = Product::create($postedData);

        if (!$save_product) {
            return redirect()->back()->with('error', 'Failed To Save Product');
        }

        return redirect()->back()->with('message', 'Product Has Been Saved Successfully');
    }

    public function view_products(){

        $products = Product::from('products as p')
                            ->join('categories as c', 'p.category_id', '=', 'c.id')
                            ->select('p.*', 'c.category_name')
                            ->orderBy('p.id', 'desc')
                            ->paginate(2);
            $data = [
                'products' => $products
            ];
            
            return view('admin.products.view_products',$data);
    }
                        
    public function edit_product($product_id){
        $product = Product::findOrFail($product_id);
        $categories = Category::all();

        $data = [
            'product' => $product,
            'categories' => $categories,
        ];
        return view('admin.products.edit_product',$data);
    }

    public function update_product(Request $request, $product_id)
    {
        
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'nullable',
            'product_qty' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_category' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $product = Product::findOrFail($product_id);
        
        $updatedData = [
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'category_id' => $request->product_category,
        ];

        if ($request->hasFile('product_image')) {
            // remove old image if exists
            if ($product->product_image && file_exists(public_path('products/'.$product->product_image))) {
                unlink(public_path('products/'.$product->product_image));
            }

            // save new one
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);

            $updatedData['product_image'] = $imageName;
        }

        
        $product->update($updatedData);

        return redirect()->back()->with('message', 'Product Has Been Updated Successfully');
    }

    public function delete_product($product_id)
    {
        $product = Product::findOrFail($product_id);

        // remove image if exists
        if ($product->product_image && file_exists(public_path('products/'.$product->product_image))) {
            unlink(public_path('products/'.$product->product_image));
        }

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    ################  PRODUCTS SECTION [ END ]   ##############
}
