@extends('users.layouts.master')
@section('title')
    <title>Home</title>
@endsection
@section('header')
    <div class="header">
        <div class="container">
            @include('users.partials.header')
            <div class="row">
                <div class="col-2">
                    <h1>Give Your Devices <br> A new Style!</h1>
                    <p>Success isn't always about greatness.
                        It's about consistency. Consistent <br> hard work gains success.
                        Greatness will come.
                    </p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="{{ asset('image/image1.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="image/category-1.jpg" width="310px" height="320px">
                </div>
                <div class="col-3">
                    <img src="image/category-2.jpg" width="310px" height="320px">
                </div>
                <div class="col-3">
                    <img src="image/category-3.jpg" width="310px" height="320px">
                </div>
            </div>
        </div>
    </div>





    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            {{-- @dd($dataProductAll) --}}
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
    </div>

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="image/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available On RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart Band 4 features a 39.9% larger
                        (than Mi Band 3) AMOLED color full-touch display with
                        adjustable brightness, so everything is clear as can be. <br>
                    </small>
                    <a href="" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Nguyen Thien Minh
                        <br> 21SE2 - 21IT293
                        <br> minhnt.21it@vku.udn.vn
                        <br> Trường Đại học Công nghệ Thông tin và Truyền thông Việt - Hàn
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="image/Min.png" alt="">
                    <h3>Nguyen Thien Minh</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Dinh Hong Duc
                        <br> 21SE1 - 21IT269
                        <br> ducdh.21it@vku.udn.vn
                        <br> Trường Đại học Công nghệ Thông tin và Truyền thông Việt - Hàn
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="image/user-1.png" alt="">
                    <h3>Dinh Duc</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Pham Le Anh Quy
                        <br> 21SE4 - 21IT440
                        <br> quypla.21it@vku.udn.vn
                        <br> Trường Đại học Công nghệ Thông tin và Truyền thông Việt - Hàn
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="image/quypla.jpg" alt="">
                    <h3>Pham Le Anh Quy</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="image/logo-macbook-149x40.png">
                </div>
                <div class="col-5">
                    <img src="image/logo-asus-149x40.png">
                </div>
                <div class="col-5">
                    <img src="image/logo-msi-149x40.png">
                </div>
                <div class="col-5">
                    <img src="image/logo-dell-149x40.png">
                </div>
                <div class="col-5">
                    <img src="image/logo-acer-149x40.png">
                </div>
            </div>
        </div>
    </div>
@endsection
