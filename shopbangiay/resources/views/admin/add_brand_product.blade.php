@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
                        </header>

                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message)//neu ton tai thi moi in ra message
                                    {
                                        echo $message;
                                        Session::put('message',null);
                                    }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{ URL::to('/save-brand-product') }}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="tenHSX" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" class="form-control" id="exampleInputEmail1" placeholder="địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người đại diện</label>
                                    <input type="text" name="nguoiDaiDen" class="form-control" id="exampleInputEmail1" placeholder="tên người đại diện">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên hệ</label>
                                    <input type="text" name="dienThoai" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại liên hệ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="8" name="Mota" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="tinhTrang" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn thương hiệu</option>
                                        <option value="1">Hiển thị thương hiệu</option>
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        

@endsection