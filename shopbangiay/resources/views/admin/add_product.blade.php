@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="tenSP" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                                    <input type="text" name="giaGoc" class="form-control" id="exampleInputEmail1" placeholder="giá gốc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán sản phẩm</label>
                                    <input type="text" name="giaBan" class="form-control" id="exampleInputEmail1" placeholder="giá bán">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" name="moTa" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="urlHinh" class="form-control" id="exampleInputEmail1" placeholder="hình ảnh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                                    <select name="HANG_SXmaHSX" class="form-control input-sm m-bot15">
                                        @foreach($hang_sx as $key => $hang)
                                        <option value="{{ $hang->maHSX }}">{{ $hang->tenHSX }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh mục sản phẩm</label>
                                    <select name="LOAI_SPmaLSP" class="form-control input-sm m-bot15">
                                        @foreach($loai_sp as $key => $loai)
                                        <option value="{{ $loai->maLSP }}">{{ $loai->tenLSP }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="tinhtrang" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn sản phẩm </option>
                                        <option value="1">Hiển thị sản phẩm</option>
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        

@endsection