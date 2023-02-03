@extends('users.layouts.master')
@section('title')
    <title>About</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="container-about">
        <div class="title-about">
            <h1>Who We Are?</h1>
            <p>DL Store paved its way in the e-commerce world in the year 2012
                as a cross-border shopping platform. This product-based
                company provides services to customers in around 180+ countries.
                DL Store delivers elite quality products from global brands to the
                doorstep of potential customers, across the globe.
                We do this by supplying millions of products from our warehouses
                which are located in the USA, UK, Japan, China, Hong Kong, Kuwait
                and Korea. Some of the features include a flexible website and app,
                convenient purchase methods, faster checkout options,
                the best customer service. All these enhance the shopping experience.
                The shipping infrastructure is refined as we have tie-ups with many
                courier services. Keep browsing our portal to get your favourite
                item(s) in your wardrobe!</p>
        </div>
    </div>

    <div class="about-content">
        <p>About</p>
        <h1>DL Store</h1> <br>
        <div class="row">
            <div class="col-4">
                <p>01.</p>
                <h1>Name</h1>
                <p>DL is derived from the name of 2 team members.</p>
            </div>
            <div class="col-4">
                <p>02.</p>
                <h1>Development</h1>
                <p>After a tough grind, the business was <br>
                    established in most parts of the Gulf <br>
                    Region such as Saudi, Qatar, UAE, Turkey, <br>
                    Egypt, Kuwait Abroad and more.</p>
            </div>
            <div class="col-4">
                <p>03.</p>
                <h1>Purpose</h1>
                <p>Enlightened shoppers with authentic <br>
                    products in 90+ countries like Japan, <br>
                    Indonesia, Bangladesh, Taiwan, Vietnam, <br>
                    Sweden, South Korea & Many More.</p>
            </div>
            <div class="col-4">
                <p>04.</p>
                <h1>Successful</h1>
                <p>Now, DL Store is accessible from 180+ <br>
                    countries and the count is increasing..</p>
            </div>
        </div>
    </div>
@endsection
