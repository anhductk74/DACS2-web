@extends('admin.layout.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Category', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ asset('admin/categories/create') }}" class="btn btn-success float-right m-2">Thêm mới sản
                            phẩm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng trong kho</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($productAll as $items)
                                    <tr>
                                        <th scope="row">{{ $stt++ }}</th>
                                        <td><img src="{{ asset($items->path . $items->imgProduct) }}" style="width: 100px">
                                        </td>
                                        <td>{{ $items->nameProduct }}</td>
                                        <td>{{ $items->price }}</td>
                                        <td>{{ $items->quantitySum }}</td>
                                        <td>
                                            <a href="categories/removeCategory/{{ $items->idProduct }}"
                                                class="btn btn-danger float-right m-2">Xóa</a>
                                            <a href="categories/edit/{{ $items->idProduct }}"
                                                class="btn btn-warning float-right m-2">Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
