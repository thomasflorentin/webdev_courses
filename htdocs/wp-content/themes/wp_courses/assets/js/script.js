

jQuery(function($){



    
    console.log('hello');




    // ACCORDEON
    var accordeon = $('.entry-accordeon .accordeon-title');

    accordeon.on('click', function(event){
    event.preventDefault();

    $(this).parent().toggleClass('open close');
    $(this).find('span').toggleClass('icon-fleche_accordeon icon-fleche_accordeon-bottom');
    });

});
