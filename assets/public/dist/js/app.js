$(function() {
    "use strict";

    
    function displayNavbarMenu() {
        $('body').toggleClass('navbar-show');
    }

    function setFullHeightRevolution() {
        var headerHeight = $('header').height();
        $('.full-height').css('height', 'calc(100vh - ' + headerHeight + 'px)');
    }

    $('.navbar-toggler').on('click', function() {
        displayNavbarMenu();
    })

    $(document).on('click', function(e) {
        var target = $(e.target);

        if($('body').hasClass('navbar-show')) {
            if(target && !(target.parents('#navbar-menu').length || target.attr('id') === 'navbar-menu') && !(target.parents('.navbar-toggler').length || target.hasClass('navbar-toggler')) ) {
                $('body').toggleClass('navbar-show')
            }
        }
    });

    $(window).on('resize', function() {
        setFullHeightRevolution();
    })


    setFullHeightRevolution();

    if($.isFunction($.fn.revolution)) {
        $('#revolution-slider').revolution({
            delay: 5000,
            startwidth: 1170,
            startheight: 500,
            hideThumbs: 10,
            navigationArrows: 'none',
            fullWidth: "on",
            fullScreen: "on",
            fullHeight: 'on',
            fullScreenOffsetContainer: "",
            touchenabled: "off",
            navigationType: "none",
            dottedOverlay: "",
            onHoverStop: "off",
        });
    }

    $('.has-actions').on('click', '.btn-add', function() {
        if($('div.input-group').length > 3){
            $('div.input-group').find('.btn-add').addClass('d-none');
        }

        if($('div.input-group').length > 4){
            return false;
        }

        var inputGroup = $(this).parents('.input-group').clone();
        
        inputGroup.find('input').val('');

        var wrapper = $(this).parents('.has-actions').append(inputGroup);

        if(wrapper.find('.input-group').length > 1 ) {
            wrapper.find('.btn-minus').removeClass('d-none');
        } else {
            wrapper.find('.btn-minus').addClass('d-none');
        }
    })

    $('.has-actions').on('click', '.btn-minus', function() {
        
        if($('div.input-group').length < 7){
            $('div.input-group').find('.btn-add').removeClass('d-none');
        }
        var wrapper = $(this).parents('.has-actions');

        if(wrapper.find('.input-group').length > 1 ) {
            $(this).parents('.input-group').remove();
        }
        
        if(wrapper.find('.input-group').length > 1 ) {
            wrapper.find('.btn-minus').removeClass('d-none');
        } else {
            wrapper.find('.btn-minus').addClass('d-none')
        }
    })
})

/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.form-input-file' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));