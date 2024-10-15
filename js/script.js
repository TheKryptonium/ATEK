$(document).ready(function(){
    $(window).on('scroll', function(){
        if($(this).scrollTop()>=50){
            $('.sticky').addClass('stickyadd');
        }else{
            $('.sticky').removeClass('stickyadd');
        }
    })

   var typed = new Typed('#typed-text', {
         strings: ["a Developper", "an Electronics Engineer", "a Project Manager"],
         typeSpeed: 100,
         backSpeed: 100,
         loop: true
     });
})

