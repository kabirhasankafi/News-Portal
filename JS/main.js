(function ($) {
    'use strict';
   $('.owl-carousel').owlCarousel({
        loop: true
        , margin: 10
        , autoplay: true
        ,nav:true
        , autoplayTimeout: 2000
        , responsive: {
            0: {
                items: 1
            }
            , 600: {
                items: 3
            }
            , 1000: {
                items: 4
            }
        }
    })
    $(window).scroll(function () {
        var scrolling = $(window).scrollTop();
        if (scrolling > 200) {
            $('.arrow-top').fadeIn();
        }
        else {
            $('.arrow-top').fadeOut();
        }
    })
    $('.arrow-top').click(function () {
        $('html').animate({
            'scrollTop': '0'
        }, 1000);
    })


    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }



    $(".btn").click(function(){
        $(".input").toggleClass("active").focus;
        $(this).toggleClass("animate");
        $(".input").val("");
      });




      ClassicEditor
      .create( document.querySelector( '#add-text' ), {
          toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo',
          'redo' ],
          heading: {
              options: [
                  { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                  { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                  { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
              ]
          }
      } )
      .catch( error => {
          console.log( error );
      } );








      


})(jQuery);