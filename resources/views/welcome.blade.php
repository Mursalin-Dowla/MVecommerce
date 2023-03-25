<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        
        @include('includes.meta')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/siteimage/'.$seo->favicon)}}" />
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








    <main class="main">
        @include('includes.slider')
        <!--End hero slider-->
        @include('includes.catslider')
        
        <!--End category slider-->
        
        @include('includes.banners')
        <!--End banners-->
        
        
        
        
        
        @include('includes.productstab')
        <!--Products Tabs-->
        
        
        
        
        
        @include('includes.bestsales')
        <!--End Best Sales-->
        
        
        
        
        
        
        
        
        
        <!-- TV Category -->
        
        @include('includes.tvcat')
        
        <!--End TV Category -->
        
        
        
        
        
        <!-- Tshirt Category -->
        
        @include('includes.tshirtcat')
        
        <!--End Tshirt Category -->
        
        
        
        
        
        
        
        
        <!-- Computer Category -->
        
        @include('includes.computer')
        
        <!--End Computer Category -->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        @include('includes.hotdeals')
        <!--End 4 columns-->
        
        
        
        
        
        
        
        
        
        <!--Vendor List -->
        
        
        @include('includes.vendorlist')


        <!--End Vendor List -->





    </main>







    @include('includes.footer')
    <!-- Preloader Start -->
    @include('includes.preloader')
    <!-- Vendor JS-->
    @include('includes.js')
</body>

</html>
