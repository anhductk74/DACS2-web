@extends('admin.layout.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Categories', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ asset('admin/categories/create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm:</label>
                                <input type="text" name="nameProduct" class="form-control" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm:</label>
                                <input type="text" name="category" class="form-control" placeholder="Loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chính:</label>
                                <input type="file" name="img" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết 1:</label>
                                <input type="file" name="img1" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết 2:</label>
                                <input type="file" name="img2" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết 3:</label>
                                <input type="file" name="img3" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá:</label>
                                <input type="text" name="price" class="form-control"" placeholder="Giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng:</label>
                                <input type="number" name="quantity" class="form-control"" placeholder="Số lượng">
                            </div>
                            <div class="form-group shadow-textarea">
                                <label for="exampleFormControlTextarea6">Detail:</label>
                                <textarea name='detail' class="form-control z-depth-1"rows="3" placeholder="Write something here..."></textarea>
                            </div>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
