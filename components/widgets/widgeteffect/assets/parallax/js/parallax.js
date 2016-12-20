$(document).ready(function(){
    $window = $('.st-content-inner');
    //Captura cada elemento section com o data-type "background"
    $('[data-parallaxam]').each(function(){
        var $scroll = $(this);
        var parallax = $scroll.data('parallaxam');
        $scroll.css({
        'background':  'url(' + parallax.img + ') 60% 0 fixed',
        'min-height':'440px'
        });

          //$scroll.children('.container-fluid').children('.text-bottom').css("margin-top","15px" );

            //Captura o evento scroll do navegador e modifica o backgroundPosition de acordo com seu deslocamento.
            $window.scroll(function() {

                var yPos = ($window.scrollTop() / parallax.speed);
                var coords = (parseInt(parallax.textoposicao) +yPos) + 'px';
                $scroll.children('.parallax-home').children('.text-center').css("margin-top",coords );
            });
   });
});
