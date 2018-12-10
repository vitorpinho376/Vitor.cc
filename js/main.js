//Scroll Reveal - Animate Section

window.sr = ScrollReveal();
window.sr = ScrollReveal({ reset: true });
sr.reveal('.module');


//Scroll Header - Animate Header

     $(window).scroll(function() {
         var scroll = $(window).scrollTop();

         if (scroll >= 100) {
             $(".floating-header").show().addClass("come-out");
         } else {
             $(".floating-header").hide().removeClass("come-out");
         }
     });
