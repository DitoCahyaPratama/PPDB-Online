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
                        @if(count($info) > 0)
                            @foreach($info as $data)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="news-box">
                                        <div class="news-img-holder">
                                            <img src="{{asset('storage/'.$data->image)}}" class="img-responsive" alt="research">
                                            <ul class="news-date1">
                                                <li>{{date('d M', strtotime($data->created_at))}}</li>
                                                <li>{{date('Y', strtotime($data->created_at))}}</li>
                                            </ul>
                                        </div>
                                        <h2 class="title-default-left-bold"><a href="#">{{ $data->title }}</a></h2>
                                        <ul class="title-bar-high news-comments">
                                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> Admin</a></li>
                                        </ul>
                                        <p>{{ substr($data->description, 0, 300) }} ...</p>
                                        <a href="{{route('info.details', $data->slug)}}" class="default-big-btn">Read MOre</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>Tidak ada info</p>
                            </div>
                        @endif


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{ $info->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-box">
                            <div class="sidebar-box-inner">
                                <h3 class="sidebar-title">Search</h3>
                                <div class="sidebar-find-course">
                                    <form id="checkout-form" action="{{ route('info.publicSearch') }}" method="GET">
                                        @csrf
                                        <div class="form-group course-name">
                                            <input id="first-name" name="search" placeholder="Type Here . . .." class="form-control" type="text" />
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
