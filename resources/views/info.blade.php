@extends('layouts.app')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area" style="background-image: url('{{asset('student/img/banner/5.jpg')}}');">
        <div class="container">
            <div class="pagination-area">
                <h1>Info Terkini</h1>
                <ul>
                    <li><a href="/">Home</a> -</li>
                    <li>Info Terkini</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- News Page Area Start Here -->
    <div class="news-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach()
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="news-box">
                                <div class="news-img-holder">
                                    <img src="img/news/4.jpg" class="img-responsive" alt="research">
                                    <ul class="news-date1">
                                        <li>27 Dec</li>
                                        <li>2016</li>
                                    </ul>
                                </div>
                                <h2 class="title-default-left-bold"><a href="#">How To Build HTML To WordPress Site?</a></h2>
                                <ul class="title-bar-high news-comments">
                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Business</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span>(03)</span> Comments</a></li>
                                </ul>
                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriesp into electronic.</p>
                                <a href="#" class="default-big-btn">Read MOre</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="pagination-center">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-box">
                            <div class="sidebar-box-inner">
                                <h3 class="sidebar-title">Search</h3>
                                <div class="sidebar-find-course">
                                    <form id="checkout-form">
                                        <div class="form-group course-name">
                                            <input id="first-name" placeholder="Type Here . . .." class="form-control" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <button class="sidebar-search-btn-full disabled" type="submit" value="Login">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News Page Area End Here -->
@endsection
