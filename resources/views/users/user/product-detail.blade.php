@extends('users.layouts.master')
@section('title')
    <title>Product Details</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset($productDetail->path . $productDetail->imgProduct) }}" width="100%" id="ProductImg">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="{{ asset($productDetail->path . $productDetail->imgProduct) }}" width="100%"
                            class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset($productDetail->path . $productDetail->img1) }}" width="100%"
                            class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset($productDetail->path . $productDetail->img2) }}" width="100%"
                            class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset($productDetail->path . $productDetail->img3) }}" width="100%"
                            class="small-img">
                    </div>
                </div>


            </div>
            <div class="col-2">
                <p>Home / Laptop</p>
                <h1>{{ $productDetail->nameProduct }}</h1>
                <h4>{{ $productDetail->price }}$</h4>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <h5>Quantity: {{ $productDetail->quantitySum }}</h5>
                <br>
                <p>{{ $productDetail->detail }}</p>
                @if (Auth::check())
                    <a href="/cart/{{ $idProduct }}" class="btn">Add To Cart</a>
                @else
                    <a href="/Account" class="btn">Add To Cart</a>
                @endif
            </div>
        </div>
    </div>


    <div class="small-container">
        <h3>Votes:</h3>
        <div class="votes">
            <form action="/product-detail/votes/{{ $idProduct }}" method="post">
                @csrf
                <div class="rating">
                    <label for="star1">
                        <input type="radio" name="star" value="1" id="star1">
                        <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="rating">
                    <label for="star2">
                        <input type="radio" name="star" value="2" id="star2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="rating">
                    <label for="star3">
                        <input type="radio" name="star" value="3" id="star3">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="rating">
                    <label for="star4">
                        <input type="radio" name="star" value="4" id="star4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="rating">
                    <label for="star5">
                        <input type="radio" name="star" value="5" id="star5">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>


    <div class="small-container">
        <div class="row">
            @foreach ($productRelated as $items)
                <div class="col-4">
                    <img src="{{ asset($items->path . $items->imgProduct) }}" alt="">
                    <h4>{{ $items->nameProduct }}</h4>
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
    </div>
@endsection
