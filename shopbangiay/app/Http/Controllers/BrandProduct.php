<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function add_brand_product()
	{
		return view('/admin.add_brand_product');
	}

	public function all_brand_product()
	{
		$all_brand_product = DB::table('hang_sx')->get();
		$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
		return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
	}     

	public function save_brand_product(Request $request)
	{
		$data = array();
		$data['tenHSX'] = $request->tenHSX;
		$data['diaChi'] = $request->diaChi;
		$data['email'] = $request->email;
		$data['nguoiDaiDen'] = $request->nguoiDaiDen;
		$data['dienThoai'] = $request->dienThoai;
		$data['Mota'] = $request->Mota;
		$data['tinhTrang'] = $request->tinhTrang;
		DB::table('hang_sx')->insert($data);
		Session::put('message','Thêm thương hiệu sản phẩm thành công');
		return Redirect::to('/add-brand-product'); 	
	}     

	public function unactive_brand_product($maHSX){
		DB::table('hang_sx')->where('maHSX',$maHSX)->update(['tinhtrang'=>1]);
		Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
		return Redirect::to('all-brand-product'); 	
	}

	public function active_brand_product($maHSX){
		DB::table('hang_sx')->where('maHSX',$maHSX)->update(['tinhtrang'=>0]);
		Session::put('message','Không Kích hoạt thương hiệu sản phẩm thành công');
		return Redirect::to('all-brand-product'); 	
	}

	public function edit_brand_product($maHSX){
		$edit_brand_product = DB::table('hang_sx')->where('maHSX',$maHSX)->get();
		$manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
		return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
	}

	public function update_brand_product(Request $request, $maHSX){
		$data = array();
		$data['tenHSX'] = $request->tenHSX;
		$data['diaChi'] = $request->diaChi;
		$data['email'] = $request->email;
		$data['nguoiDaiDen'] = $request->nguoiDaiDen;
		$data['dienThoai'] = $request->dienThoai;
		$data['Mota'] = $request->Mota;
		DB::table('hang_sx')->where('maHSX',$maHSX)->update($data);
		Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
		return Redirect::to('all-brand-product');
	}

	public function delete_brand_product($maHSX){
		DB::table('hang_sx')->where('maHSX',$maHSX)->delete();
		Session::put('message','Xóa thương hiệu sản phẩm thành công');
		return Redirect::to('all-brand-product');
	}
}
