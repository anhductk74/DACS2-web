@extends('users.layouts.master')
@section('bootstrap')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('title')
    <title>Cart Payment</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">Delivery address</h5>
                    </div>
                    <div class="card-body">
                        <form action="/cart-payment" method="get">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form11Example1">First name</label>
                                        <input type="text" name="firstName" id="form11Example1" class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form11Example2">Last name</label>
                                        <input type="text" name="lastName" id="form11Example2" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form11Example4">Address</label>
                                <input type="text" name="address" id="form11Example4" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form11Example6">Phone</label>
                                <input type="text" name="phone" id="form11Example6" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form11Example6">Note</label>
                                <textarea class="form-control" name="note" id="form11Example7"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn col-md-10">Place order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4 position-static">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font">{{ $numCart }} items</h5>
                    </div>
                    <div class="card-body">
                        <?php $totalCart = 0; ?>
                        @foreach ($cartAll as $items)
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset($items->path . $items->imgProduct) }}" class="rounded-3"
                                        style="width: 100px;" alt="Blue Jeans Jacket" />
                                </div>
                                <div class="col-md-6 ms-3">
                                    <span class="mb-0 text-price">${{ $items->price }}</span>
                                    <p class="mb-0 text-descriptions">{{ $items->nameProduct }}</p>
                                    <p class="text-descriptions mt-0">Qty:<span
                                            class="text-descriptions fw-bold">{{ $items->quantityCart }}</span>
                                    </p>
                                </div>
                            </div>
                            <?php $totalCart += $items->price * $items->quantityCart; ?>
                            <hr>
                        @endforeach
                        <div class="card-footer mt-4">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 text-muted">
                                    Subtotal
                                    <span>${{ $totalCart }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 text-muted">
                                    Ship
                                    <span>${{ $priceShip = 3.0 }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 fw-bold text-uppercase">
                                    Total to pay
                                    <span>${{ $totalCart + $priceShip }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endsection
