@extends('layouts.app')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area" style="background-image: url('{{asset('student/img/banner/5.jpg')}}');">
        <div class="container">
            <div class="pagination-area">
                <h1>Contact Us 01</h1>
                <ul>
                    <li><a href="/">Home</a> -</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Contact Us Page 1 Area Start Here -->
    <div class="registration-page-area bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-us-info1">
                        <ul>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>Phone</h3>
                                <p>+61 3 8376 6284</p>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>Address</h3>
                                <p>PO Box 1212, Malang, Politeknik Negeri Malang</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h3>E-mail</h3>
                                <p>ppdb-smk@gmail.com</p>
                            </li>
                            <li>
                                <h3>Follow Us</h3>
                                <ul class="contact-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Page 1 Area End Here -->
@endsection
