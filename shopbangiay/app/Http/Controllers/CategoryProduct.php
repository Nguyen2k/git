<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
	public function add_category_product()
	{
		return view('admin.add_category_product');
	}

	public function all_category_product()
	{
		$all_category_product = DB::table('loai_sp')->get();
		$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
		return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
	}     

	public function save_category_product(Request $request)
	{
		$data = array();
		$data['tenLSP'] = $request->tenLSP;
		$data['Mota'] = $request->Mota;
		$data['tinhtrang'] = $request->tinhtrang;
		DB::table('loai_sp')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');
		return Redirect::to('/add-category-product'); 	
	}     

	public function unactive_category_product($maLSP){
		DB::table('loai_sp')->where('maLSP',$maLSP)->update(['tinhtrang'=>1]);
		Session::put('message','Kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-category-product'); 	
	}

	public function active_category_product($maLSP){
		DB::table('loai_sp')->where('maLSP',$maLSP)->update(['tinhtrang'=>0]);
		Session::put('message','Không Kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-category-product'); 	
	}

	public function edit_category_product($maLSP){
		$edit_category_product = DB::table('loai_sp')->where('maLSP',$maLSP)->get();
		$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
		return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
	}

	public function update_category_product(Request $request, $maLSP){
		$data = array();
		$data['tenLSP'] = $request->tenLSP;
		$data['Mota'] = $request->Mota;
		DB::table('loai_sp')->where('maLSP',$maLSP)->update($data);
		Session::put('message','Cập nhật danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');
	}

	public function delete_category_product($maLSP){
		DB::table('loai_sp')->where('maLSP',$maLSP)->delete();
		Session::put('message','Xóa danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');
	}
}
