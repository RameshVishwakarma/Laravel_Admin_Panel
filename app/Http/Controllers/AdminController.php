<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use Redirect;
use App\Categories;
use App\Product;

class AdminController extends Controller
{
    public function admin_login_page(Request $request)
    {
    	$userid = $request->username;
    	$get_password = $request->password;

    	$data = DB::table('admins')->where('user_id', '=', $userid)->where('role_id', '=', 1)->first();

    	if (Hash::check($get_password, $data->password))
    	{
    		Session::put('session_admin', ['user_id' => $data->user_id, 'admin_role' => $data->role_id]);
	    	
            return Redirect::to('/secure-panel');
	    }	    
	    else
	    {
	    	return Redirect::back()->withErrors(['Wrong Credentials', 'The Message']);
	    }
    }

    public function dashboard_page()
    {
    	return view('front.dashboard');
    }
    public function admin_contact_page()
    {
    	//Session::get('session_admin')['user_id'];
    	return view('front.contact');	
    }
    public function admin_fixed_sidebar_page()
    {
    	return view('front.fixed_sidebar');
    }
    public function admin_logout_page()
    {
    	Session::flush();
		//dd(Session::get('session_admin')['user_id']);
		return Redirect::to('/');
    }

    public function admin_prod_category_page()
    {
    	return view('front.admin_catgeory');
    }
    public function category_list_page()
    {
        return view('front.category_list');
    }
    public function add_category_page(Request $request)
    {
    	$data = new Categories;
        $data->name = $request->category;

        if ($request->hasFile('cat_img'))
        {
            $image = $request->file('cat_img');
            $name_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name_img);
            $data->img = $name_img;
        }
        $data->save();
        return redirect('/category-list');
    }
    public function edit_category_page(Request $request, $id)
    {
        $data = Categories::find($id);
        return view('front.edit_category', compact('data'));
    }
    public function update_category_page(Request $request)
    {
        $data = Categories::find($request->hidden_id);
        $data->name = $request->category;
        if ($request->hasFile('cat_img'))
        {
            $image = $request->file('cat_img');
            $name_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name_img);
            $data->img = $name_img;
        }
        $data->save();
        // return redirect()->back();
        return redirect('/category-list');
    }
    public function delete_category_page($id)
    {
        $data = Categories::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function product_list_page()
    {
        return view('front.product_list');
    }
    public function add_product_page()
    {
        return view('front.add_product');
    }
    public function insert_product_page(Request $request)
    {
        $data = new Product();

        $data->cat_id = $request->select_category;
        $data->prod_name = $request->prod_name;
        if ($request->hasFile('prod_img'))
        {
            $image = $request->file('prod_img');
            $name_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name_img);
            $data->img = $name_img;
        }
        $data->price = $request->prod_price;
        $data->save();
        return redirect('/product-list');
    }
    public function edit_product_page(Request $request, $id)
    {
        $data = Product::find($id);
        return view('front.edit_product', compact('data'));
    }
    public function update_product_page(Request $request)
    {
        $data = Product::find($request->hidden_id);
        $data->cat_id = $request->select_category;
        $data->prod_name = $request->prod_name;
        if ($request->hasFile('prod_img'))
        {
            $image = $request->file('prod_img');
            $name_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name_img);
            $data->img = $name_img;
        }
        $data->price = $request->prod_price;
        $data->save();
        // return redirect()->back();
        return redirect('/product-list');
    }
    public function delete_product_page($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
}
