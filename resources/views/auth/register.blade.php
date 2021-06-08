@extends('layouts.app')

@section('content')

<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('{{ asset('student/img/banner/5.jpg') }}');">
    <div class="container">
        <div class="pagination-area">
            <h1>Pendaftaran</h1>
            <ul>
                <li><a href="/">Home</a> -</li>
                <li>Pendaftaran</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary">
    <div class="container">
        <h2 class="sidebar-title">Registration</h2>
        <div class="registration-details-area inner-page-padding">
            <form id="checkout-form" method="POST" action="{{ route('register') }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Name *</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Password *</label>
                            <input type="password" id="pass" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail Address *</label>
                            <input type="text" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone *</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="country">Country</label>
                            <div class="custom-select">
                                <select id="country" class='select2'>
                                    <option value="0">Select your country</option>
                                    <option value="1">Bangladesh</option>
                                    <option value="2">Spain</option>
                                    <option value="3">Belgium</option>
                                    <option value="3">Ecuador</option>
                                    <option value="3">Ghana</option>
                                    <option value="3">South Africa</option>
                                    <option value="3">India</option>
                                    <option value="3">Pakistan</option>
                                    <option value="3">Thailand</option>
                                    <option value="3">Malaysia</option>
                                    <option value="3">Italy</option>
                                    <option value="3">Japan</option>
                                    <option value="4">Germany</option>
                                    <option value="5">USA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="town-city">Town / City</label>
                            <input type="text" id="town-city" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">About Me</label>
                            <textarea name="about-me" type="text" id="address-line1" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order mt-30">
                            <button class="view-all-accent-btn disabled" type="submit" value="Login">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->
@endsection
