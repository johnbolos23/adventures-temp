(function ($) {
    $(function () {
        if ($(".banner-main-slider").length !== 0) {
			$(".banner-main-slider").slick({
				slidesToShow: 1,
				dots: true,
				arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 500,
                fade: true,
                cssEase: 'linear'
			});
		}


        $('.featured-region-item').on('click', function(){
            $target = $(this).data('info-target');

            $('#custom-map-render div[role="region"] div[role="button"][title="'+ $target +'"]').trigger('click');
        });

        var rippleTriggered = false;

        $('#hamburger-button').on('click', function(){
            $('#header-mega-menu').toggleClass('active');

            if( $('#header-mega-menu').hasClass('active') ){
                $('#header-mega-menu').fadeIn();
                $('html').addClass('noscrolling');
            }else{
                $('#header-mega-menu').fadeOut();
                $('html').removeClass('noscrolling');
            }

            if( !rippleTriggered ){
                rippleTriggered = true;

                setTimeout(function(){
                    $('.header-left-ripple').ripples();
                }, 700);
            }
        });

        $('#megamenu-close').on('click', function(){
            $('#header-mega-menu').removeClass('active');
            $('html').removeClass('noscrolling');

            $('#header-mega-menu').fadeOut();
        });


        $('.header-left-megamenu-item').on('click', function(){
            $megaKey = $(this).data('mega-key');

            $('.header-left-megamenu-item').not( $(this) ).removeClass('active');
            $(this).addClass('active');

            $('.header-right-megamenu-item').removeClass('active');

            $('.header-right-megamenu-item[data-mega-key="'+ $megaKey +'"]').addClass('active');
        });


       

        /* Move Label just below the input/select/textarea field */
        $('.gform_wrapper .gfield:not(.gform_validation_container)').each(function(){
            $('label', this).appendTo( $('.ginput_container:not(.ginput_container_address)', this) );
        });

        $('.gform_wrapper .gfield:not(.gform_validation_container) .ginput_container.ginput_container_address > span').each(function(){
            if( $(this).hasClass('address_country') ){
                $('label', this).appendTo( $(this) );
            }

            if( $(this).hasClass('address_state') ){
                $('label', this).appendTo( $(this) );
            }
        });
       
        $('body .gform_wrapper .gfield:not(.gform_validation_container) input, body .gform_wrapper .gfield:not(.gform_validation_container) textarea').on('keyup', function(){
            if( $(this).val() !== '' ){
                $(this).closest('.ginput_container').addClass('field-has-content');
            }else{
                if( !$(this).is(':focus') ){
                    $(this).closest('.ginput_container').removeClass('field-has-content');
                }
                
            } 
        });

        $('body .gform_wrapper .gfield:not(.gform_validation_container) input, body .gform_wrapper .gfield:not(.gform_validation_container) textarea').on('focusin', function(){
            $(this).closest('.ginput_container').addClass('field-has-content');
        });

        $('body .gform_wrapper .gfield:not(.gform_validation_container) input, body .gform_wrapper .gfield:not(.gform_validation_container) textarea').on('focusout', function(){
            if( $(this).val() === '' ){
                $(this).closest('.ginput_container').removeClass('field-has-content');
            }
        });
       
        /* Check if value exist */
        $('body .gform_wrapper .gfield:not(.gform_validation_container) input, body .gform_wrapper .gfield:not(.gform_validation_container) textarea').each(function(){
            if( $(this).val() !== '' ){
                $(this).closest('.ginput_container').addClass('field-has-content');
            }else{
                $(this).closest('.ginput_container').removeClass('field-has-content');
            } 
        });
    });
})(jQuery);
