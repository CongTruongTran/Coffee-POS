<!-- head -->
@include('include.head')

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('include.header')  
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('include.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content -->
                @yield('content')
                
                <!-- Footer -->
                @include('include.footer')
            </div>
            <!-- Page Container END -->
        </div>
    </div>
</body>
    <!-- common Javascript -->
    @include('include.scriptJs')
    <!-- custom js for page -->
    @yield('customJs')

</html>