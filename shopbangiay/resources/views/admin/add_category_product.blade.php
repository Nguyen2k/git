@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{ URL::to('/save-category-product') }}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="tenLSP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" name="Mota" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="tinhtrang" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn danh mục</option>
                                        <option value="1">Hiển thị danh mục</option>
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        

@endsection