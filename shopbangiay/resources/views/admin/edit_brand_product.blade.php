@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm
                        </header>
                           <?php
                                $message = Session::get('message');
                                if($message)//neu ton tai thi moi in ra message
                                    {
                                        echo $message;
                                        Session::put('message',null);
                                    }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->maHSX) }}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{ $edit_value->tenHSX }}" name="tenHSX" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{ $edit_value->diaChi }}" name="diaChi" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" value="{{ $edit_value->email }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người đại diện</label>
                                    <input type="text" value="{{ $edit_value->nguoiDaiDen }}" name="nguoiDaiDen" class="form-control" id="exampleInputEmail1" placeholder="Tên người đại diện">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên hệ</label>
                                    <input type="text" value="{{ $edit_value->dienThoai }}" name="dienThoai" class="form-control" id="exampleInputEmail1" placeholder="số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" name="Mota" class="form-control" id="exampleInputPassword1" >{{$edit_value->Mota }}</textarea>
                                </div>
                                
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        

@endsection