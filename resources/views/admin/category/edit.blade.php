@extends('admin.layout.admin')

@section('title')
    <title>Chỉnh sửa sản phẩm</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Category', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="/categories/update/{{ $idProduct }}" methob="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm:</label>
                            <input type="text" name="nameProduct" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên sản phẩm" value="{{ $product->nameProduct }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chính:</label>
                            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chi tiết 1:</label>
                            <input type="file" name="img1" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chi tiết 2:</label>
                            <input type="file" name="img2" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chi tiết 3:</label>
                            <input type="file" name="img3" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá:</label>
                            <input type="text" name="price" class="form-control" id="exampleInputPassword1"
                                placeholder="Giá" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng:</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputPassword1"
                                placeholder="Số lượng" value="{{ $product->quantitySum }}">
                        </div>
                        <div class="form-group shadow-textarea">
                            <label for="exampleFormControlTextarea6">Detail:</label>
                            <textarea name='detail' class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3"
                                placeholder="Write something here...">{{ $product->detail }}</textarea>
                        </div>
                </div>
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
