<!DOCTYPE html>
<!--
Used primarily by front map page
-->
<html lang="en">

<head>
    @section('htmlheader')
        @include('layouts.partials.htmlheader')
    @show    
    
    @yield('added-css')
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-green sidebar-mini ">
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
   

@section('scripts')
    @include('layouts.partials.scripts')
    @yield('added-js')
@show

</body>
</html>
