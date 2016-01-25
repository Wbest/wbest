var form1 = $('#discuss-form'), form2 = $('#audit-form'),el = $(".anim-red");
$(document).ready(function () {
    
    $(form2).validate({
        rules:{
          name:{required:true},
          email:{required:true},
          tel:{required:true},
          company:{required:true},
          url:{required:true},
        },
        highlight: function(element) {
            $(element).addClass("erroR");  
        },
        unhighlight: function(element) {
            $(element).removeClass("erroR");
        }
    });

  $(form1).validate({
        rules:{
          name:{required:true},
          email:{required:true},
          tel:{required:true},
          company:{required:true},
          url:{required:true},
          budget:{required:true}
        },
        highlight: function(element) {
            $(element).addClass("erroR");  
        },
        unhighlight: function(element) {
            $(element).removeClass("erroR");
        }
    });
});

$(".right-text-forward").click(function(){
        var lengthTel = $('#tel').val().length, myURL = 'http://www.' + $('#url').val();
       if((!!form1.valid())&&(lengthTel>5)){
       $('#tel').removeClass("erroR");
       //Форма 
       $(".form-part-1").fadeOut(0);
       $(".form-part-2").fadeIn(1000);
       // url
       $('#url').val(myURL);
       $('.url').addClass("active");
       // Пагинатор
       $(".one").removeClass("active");
       $(".two").addClass("active");
       // Текст
       $(".discuss-header-text").empty();
       $(".discuss-header-text").append( "<p>Укажите название вашей компании и адрес веб-сайта, если он есть.</p>" );
       // Кнопка
       $(".right-text-forward").css("display","none");
       $(".right-text-forward-2").css("display","block"); 
       $(".left-text-forward").css("display","block");
       $(".left-button-forward").fadeIn(1000); 
     }else if(lengthTel<5){
      $('#tel').addClass("erroR");
     }
});

// Вторая форма. НАЧАЛО.

// Первая кнопка "Далее". Начало.
$(".right-text-forward-5").click(function(){
       var lengthTel = $('#audit-tel').val().length, myURL = 'http://www.' + $('#audit-url').val();
       if((!!form2.valid())&&(lengthTel>5)){
       console.log("click");
       $('#audit-tel').removeClass("erroR");
       //Форма 
       $(".form-audit-part-1").fadeOut(0);
       $(".form-audit-part-2").fadeIn(1000);
       // url
       $('#audit-url').val(myURL);
       $('.url').addClass("active");
       // Пагинатор
       $(".one").removeClass("active");
       $(".two").addClass("active");
       // Текст
       $(".audit-header-text").empty();
       $(".audit-header-text").append( "<p>Укажите название вашей компании и адрес веб-сайта, если он есть.</p>" );
       // Кнопка
       $(".right-text-forward-5").css("display","none");
       $(".right-text-forward-6").css("display","block"); 
       $(".left-text-forward-4").css("display","block");
       $(".left-button-forward").fadeIn(1000); 
     }else if(lengthTel<5){
      $('#audit-tel').addClass("erroR");
     }
});
// Первая кнопка "Далее". Аудит. Конец.

// Кнопка назад. Аудит. Начало.
$(".left-text-forward-4").click(function(){
       //Форма 
       $(".form-audit-part-2").fadeOut(0);
       $(".form-audit-part-1").fadeIn(1000);
       // Пагинатор
       $(".two").removeClass("active");
       $(".one").addClass("active");
       // Текст
       $(".audit-header-text").empty();
       $(".audit-header-text").append( "<p>Расскажите о своем проекте или задачах.</p><p>Для начала укажите свои контактные данные.</p>" );
       // Кнопки
       // Правая
       $(".right-text-forward-6").css("display","none");
       $(".right-text-forward-5").css("display","block"); 
       // Левая
       $(".left-button-forward-4").fadeOut(0);
       //Input url
       $("#audit-url").val(""); 
});
// Кнопка назад. Аудит. Конец.

        // Кнопка submit. Аудит. Начало.
        $('#audit-form').submit(function() {
          if(!!form2.valid()){
            $(".form-audit-part-2").fadeOut(0);
            $(".audit-block-controls").fadeOut(0);
            $(".right-text-forward-6").css("display","none");
            $(".left-text-forward-4").css("display","none");
            $(".audit-header-text").empty();
            $(".audit-header-text").append( 
              "<p class='text-thank'>Спасибо, что обратились к нам!</p>"+ 
               "<p class='text-thank'>Мы свяжемся с Вами в течении нескольких"+  
               "<p class='text-thank'>наносекунд.</p>"+
               "<br>"+
               "<p class='text-thank'>С уважением,</p>"+
               "<p class='text-thank'>команда Webest</p>"
              );
            return false;
          }
        });
        // Кнопка submit. Аудит. Конец.

// Вторая форма. КОНЕЦ.

  $(".left-text-forward").click(function(){
       //Форма 
       $(".form-part-2").fadeOut(0);
       $(".form-part-1").fadeIn(1000);
       // Пагинатор
       $(".two").removeClass("active");
       $(".one").addClass("active");
       // Текст
       $(".discuss-header-text").empty();
       $(".discuss-header-text").append( "<p>Расскажите о своем проекте или задачах.</p><p>Для начала укажите свои контактные данные.</p>" );
       // Кнопки
       // Правая
       $(".right-text-forward-2").css("display","none");
       $(".right-text-forward").css("display","block"); 
       // Левая
       $(".left-button-forward").fadeOut(0);
       //Input url
       $("#url").val(""); 
});

  $(".right-text-forward-2").click(function(){
      if(!!form1.valid()){
      //Форма 
      $(".form-part-2").fadeOut(0);
      $(".form-part-3").fadeIn(1000);
      // Пагинатор
      $(".two").removeClass("active");
      $(".tree").addClass("active");
      // Текст
      $(".discuss-header-text").empty();
      $(".discuss-header-text").append( "<p>Что вас интересует?</p>" );
      // Кнопки
      // Правая
      $(".right-text-forward-2").css("display","none");
      $(".right-text-forward-3").css("display","block"); 
      // Левая
      $(".left-text-forward").css("display","none");  
      $(".left-text-forward-2").css("display","block"); 
     }
  });

    $(".left-text-forward-2").click(function(){
      $(".form-part-3").fadeOut(0);
      $(".form-part-2").fadeIn(1000);
      // Пагинатор
      $(".tree").removeClass("active");
      $(".two").addClass("active");
      // Текст
      $(".discuss-header-text").empty();
      $(".discuss-header-text").append( "<p>Укажите название вашей компании и адрес веб-сайта, если он есть.</p>" );
      // Кнопки
      // Правая
      $(".right-text-forward-3").css("display","none");
      $(".right-text-forward-2").css("display","block"); 
      // Левая
      $(".left-text-forward-2").css("display","none");  
      $(".left-text-forward").css("display","block"); 
     });

    // Выбранный интерес
    $("input.select:radio").change(function(){
      if ( this.value == 'dev-site') {
          $('.dev-site').addClass("check");
      }else{
          $('.dev-site').removeClass("check");
      }

      if ( this.value == 'mobile-app') {
          $('.mobile-app').addClass("check");
      }else{
          $('.mobile-app').removeClass("check"); 
      }

      if ( this.value == 'advance') {
          $('.advance').addClass("check");
      }else{
          $('.advance').removeClass("check");
      }

      if ( this.value == 'another') {
          $('.another').addClass("check");
      }else{
          $('.another').removeClass("check");
      }
    });

    // Предпоследняя кнопка "Далее"
    $(".right-text-forward-3").click(function(){
      if ( !$("input").is(':checked') ){
          el.addClass("blink");
          setTimeout(function(){
          el.removeClass("blink");
          }, 2000);
      }else

      if(!!form1.valid()){
      //Форма 
      $(".form-part-3").fadeOut(0);
      $(".form-part-4").fadeIn(1000);
      $(".discuss-block-form").css("margin-bottom","0");
      // Пагинатор
      $(".tree").removeClass("active");
      $(".four").addClass("active");
      // Текст
      $(".discuss-header-text").empty();
      $(".discuss-header-text").append( "<p>Укажите примерный бюджет, а так же вы можете указать детали проекта и прикрепить документ.</p>" );
      // Кнопки
      // Правая
      $(".right-text-forward-3").css("display","none");
      $(".right-text-forward-4").css("display","block");
      // Левая
      $(".left-text-forward-2").css("display","none");  
      $(".left-text-forward-3").css("display","block");
     }
  });
        // Кнопка назад. Последняя.
        $(".left-text-forward-3").click(function(){
        //Форма 
        $(".form-part-4").fadeOut(0);
        $(".form-part-3").fadeIn(1000);
        $(".discuss-block-form").css("margin-bottom","100px");
        // Пагинатор
        $(".four").removeClass("active");
        $(".tree").addClass("active");
        // Текст
        $(".discuss-header-text").empty();
        $(".discuss-header-text").append( "<p>Что вас интересует?</p>" );
        // Кнопки
        // Правая
        $(".right-text-forward-3").css("display","block");
        $(".right-text-forward-4").css("display","none");
        // Левая
        $(".left-text-forward-3").css("display","none");  
        $(".left-text-forward-2").css("display","block");
        });

        var deleteId = 0;
        $('#fileupload').click(function(){
          deleteId = ++deleteId;
          if((($(".attach-block-file").length)==1)){
            $(".block-attach").css("position","absolute");
            $(".block-attach").css("bottom","-2px");
          };
        });

        $('#fileupload').on('change', function (event, files, label) {
          var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
          x = document.getElementById("fileupload");
          for (var i = 0; i < x.files.length; i++) {
            $('.file-list').append("<div id='"+deleteId+"' class='attach-block-file'><span id='"+deleteId+"' class='close-document'>x</span>"+ x.files[i].name +"</div>");
          }
        });

        $('#discuss-form').submit(function() {
          if(!!form1.valid()){
            $(".form-part-4").fadeOut(0);
            $(".discuss-block-controls").fadeOut(0);
            $(".right-text-forward-4").css("display","none");
            $(".left-text-forward-3").css("display","none");
            $(".discuss-header-text").empty();
            $(".discuss-header-text").append( 
              "<p class='text-thank'>Спасибо, что обратились к нам!</p>"+ 
               "<p class='text-thank'>Мы свяжемся с Вами в течении нескольких"+  
               "<p class='text-thank'>наносекунд.</p>"+
               "<br>"+
               "<p class='text-thank'>С уважением,</p>"+
               "<p class='text-thank'>команда Webest</p>"
              );
            return false;
          }
        });

$(".uarr").click(function(){
  $(this).toggleClass("opened");
    $("nav").toggleClass("open");
});

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

    $('textarea').each(function() {

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

$(document).ready(function() {

  $('input').each(function() {

    $(this).on('focus', function() {
      $(this).parent('.half-label-effect').addClass('active');
    });

    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.half-label-effect').removeClass('active');
      }
    });

    if ($(this).val() != '') $(this).parent('.half-label-effect').addClass('active');

  });

});
        
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

