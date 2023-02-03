@extends('users.layouts.master')
@section('title')
    <title>Contact</title>
@endsection
@section('header')
    <div class="container">
        @include('users.partials.header')
    </div>
@endsection

@section('content')
    <div class="container row contact"><b>Contact</b></div> <br>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <h2>DL STORE</h2>
                <p><span><b>Address: </b></span><span>470 Tran Dai Nghia Street, Hoa Hai, Ngu Hanh Son, Da Nang</span></p>
                <p><span><b>Telephone: </b></span><span>0977464237 - 0382177655</span></p>
                <p><span><b>Hotline: </b></span><span>097777777</span></p>
                <p><span><b>website: </b></span><span>DLStore.com</span></p>
                <p><span><b>ID: </b></span><span>01 02 03 04 05</span></p>
                <p><span><b>Email: </b></span><span>longdt.21it@vku.udn.vn - ducdh.21it@vku.udn.vn</span></p>
                <p><span><b>Bank Account: </b></span><span>010203040506</span></p>
                <p><span><b>Bank Address: </b></span><span>Agribank Branch Ngu Hanh Son</span></p>
            </div>
            <div class="col-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.
            738711613775!2d108.25104871543998!3d15.975015746197727!2m3!1f0!2f0!3f0!
            3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!
            2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.
            !5e0!3m2!1sen!2s!4v1653905852750!5m2!1sen!2s"
                    width="600" height="420" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <b>
                    Customers can send the link to us, me by completing
                    below form. We will respond to your email,
                    Please fully declare. Pleased to serve and sincere
                    Thank you for your interest and comments for DL Store.
                </b>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <h2>Send us contact information:</h2>
                <hr style="color: #808080;" width="80%">

                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="text-inf" placeholder="Name" style="width: 60%; height: 25px"></td>
                    </tr>
                    <tr>
                        <td>Tel Number</td>
                        <td><input type="text" class="text-inf" placeholder="Tel Number"
                                style="width: 60%; height: 25px"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" class="text-inf" placeholder="Email Address"
                                style="width: 60%; height: 25px"></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>
                            <textarea class="text-inf" placeholder="Content" style="width: 60%; height: 100px"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="" class="btn text-inf">Send</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection
