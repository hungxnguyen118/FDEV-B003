@include('page_admin.widgets.head')

    <body>
    <!-- container section start -->
    <section id="container" class="">

        @include('page_admin.widgets.header')
      
        @include('page_admin.widgets.sidebar')
      
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">            
                
                @yield('main-content')

            </section>
        </section>
      <!--main content end-->
    </section>
  <!-- container section start -->

@include('page_admin.widgets.footer_script')
