@extends('users.layouts.master')
@section('title')
    <title>Products</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection
@section('content')
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <form action="{{ asset('/products/search') }}" method="get">
                <input type="search" name="search" placeholder="Tìm kiếm" id="">
            </form>

        </div>
        <div class="row">
            @foreach ($dataProductAll as $items)
                <div class="col-4">
                    <a href="product-detail/{{ $items->idProduct }}"><img
                            src="{{ asset($items->path . $items->imgProduct) }}" alt=""></a>
                    <a href="product-detail/{{ $items->idProduct }}">
                        <h4>{{ $items->nameProduct }}</h4>
                    </a>
                    <div class="rating">
                        @for ($i = 0; $i < $star[$items->idProduct]; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $star[$items->idProduct]; $i++)
                            <i class="fa-regular fa-star"></i>
                        @endfor
                    </div>
                    <p>{{ $items->price }}$</p>
                </div>
            @endforeach

        </div>
        <div class="page-btn">
            @for ($i = 1; $i <= $pageProduct; $i++)
                <a href="products?page={{ $i }}"><span>{{ $i }}</span></a>
            @endfor
        </div>
    </div>
@endsection
