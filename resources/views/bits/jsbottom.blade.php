<!-- All Scripts -->
@auth()
    @if(Route::currentRouteName() == 'editCar')
        @include("mods.admin.bits.ajaxPhotos")
    @elseif(Route::currentRouteName() == 'messages')
        @include("mods.admin.bits.ajaxMsg")
    @endif
@endauth
<!-- Jquery Library Call -->
<script src="{{asset("js/jquery-2.0.0.min.js")}}"></script> <!-- Jquery Library Call -->
<script src="{{asset("vendor/prettyphoto/js/prettyphoto.js")}}"></script> <!-- PrettyPhoto Plugin -->
<script src="{{asset("js/ui-plugins.js")}}"></script> <!-- UI Plugins -->
<script src="{{asset("js/helper-plugins.js")}}"></script> <!-- Helper Plugins -->
<script src="{{asset("vendor/owl-carousel/js/owl.carousel.min.js")}}"></script> <!-- Owl Carousel -->
<script src="{{asset("js/bootstrap.js")}}"></script> <!-- UI -->
<script src="{{asset("vendor/flexslider/js/jquery.flexslider.js")}}"></script> <!-- FlexSlider -->
<script src="{{asset("js/init.js")}}"></script>
