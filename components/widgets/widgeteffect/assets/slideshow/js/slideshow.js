$(document).ready(function() {

if(typeof $('[data-owlcarousel]') == 'object')
{
var CarouselWid = $('[data-owlcarousel]');
OptionsWidget = CarouselWid.data('owlcarousel');
// slideshow default
 var optionsDefault = {
     lazyLoad : true,
     navigation : true,
     slideSpeed : 300,
     paginationSpeed : 400,
     singleItem : true,
     transitionStyle : "fade",
     navigationText: [
       "<i class='fa fa-angle-left'></i>",
       "<i class='fa fa-angle-right'></i>"
       ],

 };

 var options = $.extend({}, optionsDefault, OptionsWidget);

  CarouselWid.owlCarousel(options);

}



});
