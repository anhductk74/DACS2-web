@extends('users.layouts.master')
@section('title')
    <title>Cart</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            $totalPrice = 0;
            ?>
            @foreach ($cartAll as $items)
                <tr>
                    <td>
                        <div class="cart-info">
                            <a href="/product-detail/{{ $items->idProduct }}">
                                <img src="{{ asset($items->path . $items->imgProduct) }}">
                            </a>
                            <div>
                                <a href="/product-detail/{{ $items->idProduct }}">
                                    <h3 style="color:#585656">{{ $items->nameProduct }}</h3>
                                </a>
                                <small class="cart-price">Price: {{ $items->price }}</small> <br>
                                <a href="/cart-remove/{{ $items->idCart }}" class="cart-remove">Remove</a>
                            </div>
                        </div>
                    </td>
                    <form action="/cart/update/{{ $items->idCart }}" methob="post">
                        @csrf
                        <td><input type="number" name="quantityCart" value="{{ $items->quantityCart }}" min="1"
                                class="cart-quantity" style="width:50px">
                            <button type="submit" name="submit"><i class="fa-solid fa-rotate"></i></button>
                        </td>
                    </form>
                    <td>{{ $items->quantityCart * $items->price }}</td>
                </tr>
                <?php
                $totalPrice += $items->quantityCart * $items->price;
                ?>
            @endforeach
            @if ($totalPrice == 0)
                <tr>
                    <td colspan="3">
                        <p style="text-align:center; font-size:50px; padding: 160px 0;">NO PRODUCTS</p>
                    </td>
                </tr>
            @endif
        </table>
        <div class="total-price">
            <table>
                @if ($totalPrice != 0)
                    <tr>
                        <td>Subtotal</td>
                        <td>{{ $totalPrice }}$</td>
                    </tr>
                @endif
                <tr>
                    <td style="padding-bottom: 150px"><a href="/order" class="btn">Order All</a></td>
                    @if ($totalPrice != 0)
                        <td style="padding-bottom: 150px">
                            <a href="/cart-pay" class="btn">Buy Now &#8594;</a>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
@endsection
