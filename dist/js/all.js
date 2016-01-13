

// form-contacts
$(document).ready(function() {

  $('input').each(function() {

    $(this).on('focus', function() {
      $(this).parent('.label-effect').addClass('active');
    });

    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.label-effect').removeClass('active');
      }
    });

    if ($(this).val() != '') $(this).parent('.label-effect').addClass('active');

  });

});

$(document).ready(function() {

  $('textarea').each(function() {

    $(this).on('focus', function() {
      $(this).parent('.label-effect-1').addClass('active');
    });

    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.label-effect-1').removeClass('active');
      }
    });

    if ($(this).val() != '') $(this).parent('.label-effect-1').addClass('active');

  });

});
        
 //    var start = $('.start-page').offset().top, second = $('.second-section').offset().top, w = $(window);
 //    var scroll = w.scrollTop(), outerHeight = $('.start-page').outerHeight(),outerHeightSecond = $('.second-section').outerHeight();
    
 //    console.log("scroll"+"-"+scroll);console.log("second"+"-"+second);console.log("outerHeight"+"-"+outerHeight);
 //    console.log("outerHeightSecond"+"-"+outerHeightSecond);
    
 //    // if (scroll===100)
 //    //     {   
 //    //         $('html,body').animate({
 //    //         scrollTop: second+100
 //    //         }, 2000).disablescroll();
 //    //     }

 //    //         if(second<scroll)
 //    //             {
 //    //                 $('html,body').disablescroll("undo");
 //    //             }

 //    //                 if(second===scroll)
 //    //                 {
 //    //                    $('html,body').animate({
 //    //                    scrollTop: start
 //    //                   }, 2000).disablescroll();  
 //    //                 }

 //    //                     if(start===scroll)
 //    //                         {
 //    //                            $('html,body').disablescroll("undo"); 
 //    //                         }  

 //    if (scroll>0 || scroll===second)
 //        {  
 //            $('.start-page').slideUp(1000).disablescroll();
 //            $('.content-header').css('background-attachment', 'fixed');
 //        }

 //        if(scroll>=second){
 //           $('html,body').disablescroll("undo");  
 //        }


 //        if (scroll===0)
 //        {  
 //            $('.start-page').slideDown(600).disablescroll("undo");
 //        }
 //    //    if (second===scroll)
 //    //     {      
 //    //           $('.start-page').bind("mousewheel", function() {
 //    //             return false;
 //    //             });

 //    //           $('html,body').animate({
 //    //            scrollTop: start
 //    //           }, 2000)
 //    //     //       
 //    //     }  

 // });
    
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 2,
                    nav: true
                  },
                  1000: {
                    items: 2,
                    nav: true,
                    navText: [
                    "<div class='owl-prev dots-arrow-btn' style=''><svg><circle class='knot knot-1' r='3' cx='28' cy='30' data-svg-origin='12 27' style=''></circle><circle class='knot' r='3' cx='33' cy='12' data-svg-origin='30 9' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);'></circle><circle class='knot' r='3' cx='33' cy='48' data-svg-origin='30 45' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);'></circle><line class='line-1' x1='28' y1='30' x2='28' y2='12' data-svg-origin='15 30' style=''></line><line class='line-2' x1='28' y1='30' x2='28' y2='48' data-svg-origin='15 30' style=''></line></svg></div>",
                    "<div class='owl-next dots-arrow-btn' style=''><svg><circle class='knot knot-2' r='3' cx='28' cy='30' data-svg-origin='12 27' style=''></circle><circle class='knot' r='3' cx='33' cy='12' data-svg-origin='30 9' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);'></circle><circle class='knot' r='3' cx='33' cy='48' data-svg-origin='30 45' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);'></circle><line class='line-3' x1='28' y1='30' x2='28' y2='12' data-svg-origin='15 30' style=''></line><line class='line-4' x1='28' y1='30' x2='28' y2='48' data-svg-origin='15 30' style=''></line></svg></div>"
                    ],
                    loop: false,
                    margin: 60,
                  }
                }
              })
            })

$("a").click(function(){
  $(this).toggleClass("opened");
    $("nav").toggleClass("open");
      $(".nav-place-menu").toggleClass("transform");
});


        var counter = 0,
        total   = $( 'li' ).length, // total of items
        show    = 4, // how many items are showed
        result  = total - show;

    $( '#prev' ).on( 'click', function(){
        if( counter === 0 ) {
          return false;
        }
        counter--;
        $( 'ul' ).animate({
          top: '+=110'},
        500 );
    });

    $( '#next' ).on( 'click', function(){
      if( counter === result ) {
          return false;
        }
        counter++;
        $( 'ul' ).animate({
          top: '-=110'},
        500 );
    });


$(".team-block-photo-1").hover(function() {
  $(".mask-photo-1").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-1").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-2").hover(function() {
  $(".mask-photo-2").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-2").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-3").hover(function() {
  $(".mask-photo-3").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-3").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-4").hover(function() {
  $(".mask-photo-4").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-4").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-5").hover(function() {
  $(".mask-photo-5").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-5").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-6").hover(function() {
  $(".mask-photo-6").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-6").css("background", "rgba(55,170,255,0.7)"); 
  }
);

$(".team-block-photo-7").hover(function() {
  $(".mask-photo-7").css("background", "transparent");
}, 
  function () {
  $(".mask-photo-7").css("background", "rgba(55,170,255,0.7)"); 
  }
);


$("#footer-big-button-1").hover(
  function () {
      $("#footer-big-button-2").css("background", "#fff");
      $("#footer-big-button-2 p").css("color", "#000");
      $("#footer-big-button-2 a").css("color", "#000");
      $(".icon-3").css("color", "#000");
  }, 
  function () {
      $("#footer-big-button-2").css("background", "linear-gradient(to bottom left,#3f70ab,#37aade)");
      $("#footer-big-button-2 p").css("color", "#fff");
      $("#footer-big-button-2 a").css("color", "#fff");
      $(".icon-3").css("color", "#fff");  
  }
);

$("#footer-big-button-3").hover(
  function () {
      $("#footer-big-button-2").css("background", "#fff");
      $("#footer-big-button-2 p").css("color", "#000");
      $("#footer-big-button-2 a").css("color", "#000");
      $(".icon-3").css("color", "#000");
  }, 
  function () {
      $("#footer-big-button-2").css("background", "linear-gradient(to bottom left,#3f70ab,#37aade)");
      $("#footer-big-button-2 p").css("color", "#fff");
      $("#footer-big-button-2 a").css("color", "#fff");
      $(".icon-3").css("color", "#fff");  
  }
);

