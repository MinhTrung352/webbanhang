(function($){

    'use strict';
    
    /*
     *  Search toggle.
     */
    $( '.button-search' ).on( 'click.basic', function( event ) {
        var that    = $( this ),
            wrapper = $( '.wpo-search-form' );

        that.toggleClass( 'active' );
        wrapper.slideToggle( 'slow', 'swing' );
        if ( that.is( '.active' ) || $( '.button-search .screen-reader-text' )[0] === event.target ) {
            wrapper.find( '.input-search' ).focus();
        }  
    } );

    jQuery(document).ready(function() {

        if($('.blog-masonry').length > 0){
            //isotope blog masonry
            jQuery('.blog-masonry').isotope({
                layoutMode: 'masonry',
                itemSelector: '.isotope-item',
            });
        }
        
        if($('.isotope').length > 0){
            //portfolio isotope filter
            var container = jQuery('.isotope');
            var filter = jQuery('.isotope-filter');
            var $duration = container.data('isotope-duration');
            container.isotope({
                filter : '*',
                animationOptions : {duration: $duration}
            });
            filter.find('a').click(function() {
                var selector = jQuery(this).attr('data-filter');
                filter.find('a').removeClass('active');
                jQuery(this).addClass('active');
                container.isotope({
                    filter: selector,
                    animationOptions:{
                        animationDuration: $duration,
                        queue: false
                    }
                });
                return false;
            });

             jQuery(window).load(function(){
                container.isotope("layout");
            });
        }
        if( jQuery('.wpo-prettyPhoto').length > 0){
            $("a[rel^='prettyPhoto[all]']").prettyPhoto({
                animation_speed:'normal',
                theme:'light_square',
                social_tools: false,
            });
        }
        if( jQuery( 'a.video-popup').length >0) {
            jQuery('a.video-popup').click(function(){
                var title = jQuery(this).data('title');
                var id = jQuery(this).data('id');
                jQuery('#videoModal').find('.modal-header').append('<h4 class="modal-title">'+title+'</h4>');

                jQuery.post(ajaxurl,{action:'wpo_video_popup',id:id}, function(data, textStatus, xhr) {
                    jQuery('#videoModal .modal-body').html(data);
                });
            });

            jQuery('#videoModal').on('hidden.bs.modal',function(){
                jQuery(this).find('.modal-body').empty().append('<span class="spinner"></span>');
                jQuery(this).find('.modal-title').remove();
            });
        }
        

        // Enable menu toggle for small screens.
        var nav = $( '#primary-navigation' ), button, menu;
        if ( ! nav ) {
            return;
        }

        button = nav.find( '.menu-toggle' );
        if ( ! button ) {
            return;
        }

        // Hide button if menu is missing or empty.
        menu = nav.find( '.nav-menu' );
        if ( ! menu || ! menu.children().length ) {
            button.hide();
            return;
        }

        $( '.menu-toggle' ).on( 'click.basic', function() {
            nav.toggleClass( 'toggled-on' );
        } );

        jQuery('.yith-wcwl-add-to-wishlist div[style="clear:both"]').remove();

        var container = document.querySelector('#container');
        // init

        $('[data-toggle="offcanvas"]').click(function () {
            $('.row-offcanvas').toggleClass('active')           
        });
    });
    /** 
     * 
     * Automatic apply  OWL carousel
     */
     $(".owl-carousel-play .owl-carousel").each( function(){
        var owl = $(this);
        wpo_play_owl_carousel( owl );
     } ); 


     $(document).ready( function(){
            if( $('[data-item="floating-button"]').length > 0 ) {
                $("body").append( '<div id="floatingbutton" class="hidden-xs hidden-sm"></div>' );
                
                var $first = $('[data-item="floating-button"]').first().parent(); 
                var top = $first.offset().top; 
                $('[data-item="floating-button"]').each( function(){   
                    $("#floatingbutton").append( $(this).html() );
                    $(this).remove();
                } );
                   
                $("#floatingbutton").css( {top:top, 'left':$("#wpo-mainbody .container").first().offset().left - $("#floatingbutton").width()  - 30 } ).show();
                
                $( window ).resize(function() {
                    if( $( window ).width() > 900 ){
                        $("#floatingbutton").css( {top:top, 'left':$("#wpo-mainbody .container").first().offset().left - $("#floatingbutton").width()  - 30 } ).show();
                    } 
                });
                $(window).scroll( function(){  
                  //  console.log( $( window ).scrollTop() )
                    if(  $(this).scrollTop() +50 < parseInt(top)  ) {
                    //   $("#floatingbutton").stop().animate( {top:top},600);
                    }
                 } );

                $(function() {
                  $('#floatingbutton a[href*=#]:not([href=#])').click(function() {
                    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                      var target = $(this.hash);
                      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                      if (target.length) {
                        var top = target.offset().top-50;  
                        $('html,body').stop().animate({
                          scrollTop: top
                        }, 600);
                        $("#floatingbutton").stop().animate( {top:50},600);
                        return false;
                      }
                    }
                  });
                });
            }    
     } );
})(jQuery);

function wpo_play_owl_carousel( owl ){
    var $ = jQuery; 

    var config = {
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        pagination : $(owl).data( 'pagination' )
     }; 
     
    if( $(owl).data('slide') == 1 ){
        config.singleItem = true;
    }else {
        config.items = $(owl).data( 'slide' );
    }
    $(owl).owlCarousel( config );
    $('.left',$(owl).parent()).click(function(){
          owl.trigger('owl.prev');
          return false; 
    });
    $('.right',$(owl).parent()).click(function(){
        owl.trigger('owl.next');
        return false; 
    });

}