@extends('admin.layout.admin')

@section('title')
    <title>Đơn giao hàng thành công</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Order Confirm', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Người nhận</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($shipSuccess as $items)
                                    <tr>
                                        <th scope="row">{{ $stt++ }}</th>
                                        <th>{{ $items->receiverName }}</th>
                                        <td><img src="{{ asset($items->path . $items->imgProduct) }}" style="width: 100px">
                                        </td>
                                        <td>{{ $items->nameProduct }}</td>
                                        <td>${{ $items->price }}</td>
                                        <td>{{ $items->quantitySum }}</td>
                                        <td>{{ $items->address }}</td>
                                        <td>{{ $items->phone }}</td>
                                        <td>{{ $items->note }}</td>
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
