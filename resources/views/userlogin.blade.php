<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nest - Multipurpose eCommerce HTML Template</title>
        @include('includes.meta')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend')}}/assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        @include('includes.css')
    </head>


<body>
    <!-- Modal -->
    @include('includes.quickview')
    <!-- Header  -->
    @include('includes.header')

    <!-- End Header  -->


    @include('includes.mobileheader')
    <!--End header-->








    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> User Login
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{asset('frontend')}}/assets/imgs/page/login-1.png" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Login</h1>
                                            <p class="mb-30">Don't have an account? <a href="page-register.html">Create here</a></p>
                                        </div>
                                        <form method="post" action="{{route('login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text"  name="email" placeholder="Username or Email *" />  
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror                                          
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" name="password" placeholder="Your password *" />
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <input type="text"  name="security" placeholder="Security code *" />
                                                    @error('security')
                                                        <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                                </div>
                                                @php
                                                   $code = rand(1000,9999); 
                                                @endphp
                                                <span class="security-code">
                                                    <b class="text-new">{{$code}}</b> 
                                                    <input value="{{$code}}" readonly type="hidden" name="randcode">                                                                                            
                                                </span>
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
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
    </main>







    @include('includes.footer')
    <!-- Preloader Start -->
    @include('includes.preloader')
    <!-- Vendor JS-->
    @include('includes.js')
</body>

</html>
