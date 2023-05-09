(function ($) {
    $(function () {

        $arrowLeft = '<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.4" filter="url(#filter0_b_348_715)"><rect width="60" height="60" rx="30" transform="matrix(-1 0 0 1 60 0)" fill="black" fill-opacity="0.6"/><path d="M33.5 23L26.5 30L33.5 37" stroke="white" stroke-width="4" stroke-linecap="round"/></g><defs><filter id="filter0_b_348_715" x="-20" y="-20" width="100" height="100" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feGaussianBlur in="BackgroundImageFix" stdDeviation="10"/><feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_348_715"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_348_715" result="shape"/></filter></defs></svg>';
        $arrowRight = '<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_b_348_713)"><rect width="60" height="60" rx="30" fill="black" fill-opacity="0.6"/><path d="M26.5 23L33.5 30L26.5 37" stroke="white" stroke-width="4" stroke-linecap="round"/></g><defs><filter id="filter0_b_348_713" x="-20" y="-20" width="100" height="100" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feGaussianBlur in="BackgroundImageFix" stdDeviation="10"/><feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_348_713"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_348_713" result="shape"/></filter></defs></svg>';

        if( $(".post-item-slider").length !== 0 ){
            $(".post-item-slider").slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                adaptiveHeight: false,
                prevArrow: '<button class="slick-arrow slick-prev">'+ $arrowLeft +'</button>',
                nextArrow: '<button class="slick-arrow slick-next">'+ $arrowRight +'</button>',
                responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							arrows: true,
						},
                    },
                    {
                        breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: true,
						},
                    },
				],
            });

        }

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
