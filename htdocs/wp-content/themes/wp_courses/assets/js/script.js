

jQuery(function($){




    console.log('hello');




    // ACCORDEON

    $('.entry-level').each( function() {
        that_height = $(this).outerHeight();
        $(this).css('max-height', that_height);
        $(this).toggleClass('open close');
    })

    var level = $('.entry-level .level-title');

    level.on('click', function(event){
        event.preventDefault();

        if( $(this).parent().hasClass('open') ) {

        }
        else {

            $('.entry-level').each( function() {
                $(this).removeClass('open');
                $(this).addClass('close');
            });

        }

        $(this).parent().toggleClass('open close');

    });






    console.log('goodbye');


});
