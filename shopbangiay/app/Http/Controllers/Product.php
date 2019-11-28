<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start();

class Product extends Controller
{
    public function add_product()
	{
		$loai_sp = DB::table('loai_sp')->orderby('maLSP','desc')->get();
		$hang_sx = DB::table('hang_sx')->orderby('maHSX','desc')->get();
		return view('/admin.add_product')->with('loai_sp',$loai_sp)->with('hang_sx',$hang_sx);
	}

	public function all_product()
	{
		$all_product = DB::table('san_pham')->get();
		$manager_product = view('admin.all_product')->with('all_product',$all_product);
		return view('admin_layout')->with('admin.all_product',$manager_product);
	}     

	public function save_product(Request $request)
	{
		$data = array();
		$data['tenSP'] = $request->tenSP;
		$data['giaGoc'] = $request->giaGoc;
		$data['giaBan'] = $request->giaBan;
		$data['moTa'] = $request->moTa;
		$data['san_phammaHSX'] = $request->san_phammaHSX;
		$data['LOAI_SPmaLSP'] = $request->LOAI_SPmaLSP;
		$data['tinhTrang'] = $request->tinhTrang;
		$data['urlHinh'] = $request->urlHinh;
		$get_image = file('urlHinh');
		
		if($get_image)
		{
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode('.',$get_name_image));
			$new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
			$get_image->move('public/uploads/product',$new_image);
			$data['urlHinh']=$new_image;
			DB::table('san_pham')->insert($data);
			Session::put('message','Thêm sản phẩm thành công');
			return Redirect::to('/add-product'); 	
		}     

	}
		

	public function unactive_product($product_id){
		DB::table('san_pham')->where('maSP',$product_id)->update(['tinhtrang'=>1]);
		Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
		return Redirect::to('all-product'); 	
	}

	public function active_product($product_id){
		DB::table('san_pham')->where('maSP',$product_id)->update(['tinhtrang'=>0]);
		Session::put('message','Không Kích hoạt thương hiệu sản phẩm thành công');
		return Redirect::to('all-product'); 	
	}

	public function edit_product($product_id){
		$edit_product = DB::table('san_pham')->where('maSP',$product_id)->get();
		$manager_product = view('admin.edit_product')->with('edit_product',$edit_product);
		return view('admin_layout')->with('admin.edit_product',$manager_product);
	}

	public function update_product(Request $request, $product_id){
		$data = array();
		$data['tenHSX'] = $request->product_name;
		$data['diaChi'] = $request->product_address;
		$data['email'] = $request->product_email;
		$data['nguoiDaiDen'] = $request->product_representative;
		$data['dienThoai'] = $request->product_phone;
		$data['Mota'] = $request->product_desc;
		DB::table('san_pham')->where('maSP',$product_id)->update($data);
		Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
		return Redirect::to('all-product');
	}

	public function delete_product($product_id){
		DB::table('san_pham')->where('maSP',$product_id)->delete();
		Session::put('message','Xóa thương hiệu sản phẩm thành công');
		return Redirect::to('all-product');
	}
}
