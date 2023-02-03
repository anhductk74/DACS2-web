@extends('users.layouts.master')
@section('title')
    <title>Order</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <style>
        .small-container {
            max-width: 1400px;
        }
    </style>
    <div class="small-container cart-page">
        <table>
            <tr>
                <th style="text-align: center;">Product</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Subtotal</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Actions</th>
            </tr>
            @foreach ($orderAll as $items)
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="{{ $items->path . $items->imgProduct }}">
                            <div>
                                <p>{{ $items->nameProduct }}</p>
                                <small class="cart-price">Price: {{ $items->price }}$</small> <br>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">{{ $items->qtyOrder }}</td>
                    <td style="text-align: center;">{{ $items->price * $items->qtyOrder }}$</td>
                    <td style="text-align: center;">
                        @if ($items->statusOrder == 'unConfirm')
                            <p>Wait for confirm</p>
                        @elseif ($items->statusOrder == 'confirm')
                            <p>Confirm</p>
                        @elseif ($items->statusOrder == 'canceled')
                            <p>Canceled</p>
                        @elseif ($items->statusOrder == 'shipFail')
                            <p>Delivery failed</p>
                        @elseif ($items->statusOrder == 'shipSuccess')
                            <p>Delivery Success</p>
                        @endif
                    </td>
                    <td>
                        @if ($items->statusOrder == 'unConfirm')
                            <a href="/order/remove/{{ $items->id }}" class="btn btn-primary">Delete</a>
                        @elseif ($items->statusOrder == 'confirm')
                            <p style="text-align: center;">Waiting to receive</p>
                        @elseif ($items->statusOrder == 'canceled')
                            <a href="/order/remove/{{ $items->id }}" class="btn btn-primary">Delete</a>
                        @elseif ($items->statusOrder == 'shipFail')
                            <a href="/order/remove/{{ $items->id }}" class="btn btn-primary">Delete</a>
                        @elseif ($items->statusOrder == 'shipSuccess')
                            <a href="/product-detail/{{ $items->idProduct }}" class="btn btn-primary">View product</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td></td>
                    <td style="padding-bottom: 150px">
                        <a href="/cart" class="btn">Back to cart</a>

                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
