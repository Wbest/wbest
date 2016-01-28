/*########################################*/
/* Модальное окно с формой - ОБСУЖДЕНИЕ.  */
/* Модальное окно с формой - АУДИТ.       */
/* ФОРМА- ОБСУЖДЕНИЕ.                     */
/* ФОРМА - ЗАКАЗТЬ АУДИТ                  */
/* НАСТРОЙКИ ФОРМ. ЭФФЕКТ INPUT'ов.       */
/* Три блока в footer'e. Эффект при hover */
/*########################################*/

var form1 = $('#discuss-form'), form2 = $('#audit-form'),el = $(".anim-red");

!function(n,r){"function"==typeof define&&define.amd?define(r):"object"==typeof exports?module.exports=r():n.transformicons=r()}(this||window,function(){"use strict";var n={},r="tcon-transform",t={transform:["click"],revert:["click"]},e=function(n){return"string"==typeof n?Array.prototype.slice.call(document.querySelectorAll(n)):"undefined"==typeof n||n instanceof Array?n:[n]},o=function(n){return"string"==typeof n?n.toLowerCase().split(" "):n},f=function(n,r,f){var c=(f?"remove":"add")+"EventListener",u=e(n),s=u.length,a={};for(var l in t)a[l]=r&&r[l]?o(r[l]):t[l];for(;s--;)for(var d in a)for(var v=a[d].length;v--;)u[s][c](a[d][v],i)},i=function(r){n.toggle(r.currentTarget)};return n.add=function(r,t){return f(r,t),n},n.remove=function(r,t){return f(r,t,!0),n},n.transform=function(t){return e(t).forEach(function(n){n.classList.add(r)}),n},n.revert=function(t){return e(t).forEach(function(n){n.classList.remove(r)}),n},n.toggle=function(t){return e(t).forEach(function(t){n[t.classList.contains(r)?"revert":"transform"](t)}),n},n});

$(document).ready(function ($) {
    var full = $('#fullscreen'), full2 = $('#fullscreen-2');

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

          /*##############################################*/
          /* Модальное окно с формой - ОБСУЖДЕНИЕ. НАЧАЛО */
          /*##############################################*/
          $(full).data('state','open');
          $('.discuss-window').click(function(){
            if($(full).data('state') == 'open'){
              $(full).fadeIn(500);
              $(full).data('state','close');
              $("body").css("overflow","hidden");
              //console.log($(full).data('state') );
            }
          });

          // Кнопка закрыть
          $('.close').click(function(){
            if($(full).data('state') == 'close'){
              $(full).fadeOut();
              $(full).data('state','open');

              $("body").css("overflow","auto");

              for(var i=1;i<=4;++i){
                $(".discuss-block-form").find(".form-part-"+i+"").css("display","none");
                $(".right-button-forward").find(".right-text-forward-"+i+"").css("display","none");
                $(".left-button-forward").find(".left-text-forward-"+i+"").css("display","none");
              }
              
                // Сброс настроек с input'ов
                $(".discuss-block-form").find(".label-effect").removeClass("active");
                $(".discuss-block-form").find(".half-label-effect").removeClass("active");
                $(".discuss-block-form").find(".anim-red").removeClass("check");
                // Сброс формы.
                $('#discuss-form').trigger('reset');
                //Форма. Добавленные документы. 
                $('.file-list').empty();
                // Первая форма.
                $(".form-part-1").css("display","block");
                $(".discuss-block-form").css("margin-bottom","100px");
                // Пагинатор
                $(".two").removeClass("active");
                $(".tree").removeClass("active");
                $(".four").removeClass("active");
                $(".one").addClass("active");
                // Блок-footer
                $(".discuss-block-controls").css("display","block");
                // Кнопки
                $(".right-text-forward").css("display","block");
                $(".left-button-forward").css("display","none");
                // Текст
                $(".discuss-header-text").empty();
                $(".discuss-header-text").append( "<p>Расскажите о своем проекте или задачах.</p><p>Для начала укажите свои контактные данные.</p>" );
                }
          }); 
          /*#############################################*/
          /* Модальное окно с формой - ОБСУЖДЕНИЕ. КОНЕЦ */
          /*#############################################*/
          

          /*#########################################*/
          /* Модальное окно с формой - АУДИТ. НАЧАЛО */
          /*#########################################*/
          $(full2).data('state','open');
          $('.audit-launch').click(function(){
            if($(full2).data('state') == 'open'){
              $(full2).fadeIn(500);
              $(full2).data('state','close');
              $("body").css("overflow","hidden");
              //console.log($(full).data('state') );
            }
          });

          //Кнопка закрыть. Крестик. 
          $('.close').click(function(){
            if($(full2).data('state') == 'close'){
              $(full2).fadeOut();
              $(full2).data('state','open');

              $("body").css("overflow","auto");

              for(var i=1;i<=6;++i){
                $(".audit-block-form").find(".form-part-"+i+"").css("display","none");
                $(".right-button-forward").find(".right-text-forward-"+i+"").css("display","none");
                $(".left-button-forward").find(".left-text-forward-"+i+"").css("display","none");
              }
              
                // Сброс настроек с input'ов
                $(".audit-block-form").find(".label-effect").removeClass("active");
                $(".audit-block-form").find(".half-label-effect").removeClass("active");
                $(".audit-block-form").find(".anim-red").removeClass("check");
                // Сброс формы.
                $('#audit-form').trigger('reset');
                // Первая форма.
                $(".form-audit-part-1").css("display","block");
                $(".audit-block-form").css("margin-bottom","100px");
                // Пагинатор
                $(".two").removeClass("active");
                $(".one").addClass("active");
                // Блок-footer
                $(".audit-block-controls").css("display","block");
                // Кнопки
                $(".right-text-forward-5").css("display","block");
                $(".left-button-forward").css("display","none");
                // Текст
                $(".audit-header-text").empty();
                $(".audit-header-text").append( "<p>Расскажите о своем проекте или задачах.</p><p>Для начала укажите свои контактные данные.</p>" );
                }
          });
          /*########################################*/
          /* Модальное окно с формой - АУДИТ. КОНЕЦ */
          /*########################################*/  
});

/*###########################*/
/* ФОРМА- ОБСУЖДЕНИЕ. НАЧАЛО */
/*###########################*/

// Первая кнопка "Далее"
$(".right-text-forward").click(function(){
        var lengthTel = $('#tel').val().length, myURL = 'http://www.' + $('#url').val(), filter = /((?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?)/g;
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
       // Кнопки
        //Правая
       $(".right-text-forward").css("display","none");
       $(".right-text-forward-2").css("display","block");
        //Левая 
       $(".left-text-forward").css("display","block");
       $(".left-button-forward").fadeIn(1000); 
     }else if(filter.test($('#tel').val())){
      $('#tel').removeClass("erroR");
      $('.tel-active').addClass('active');
      }else{
      $('#tel').addClass("erroR");
     }
});

//Первая кнопка "Назад" 
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

    // Вторая кнопка "Далее".
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

    // Вторая кнопка "Назад".
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


            // Спускается на уровень при добавлении второго файла.
            var deleteId = 0;
            $('#fileupload').click(function(){
              deleteId = ++deleteId;
              if((($(".attach-block-file").length)==1)){
                $(".block-attach").css("position","absolute");
                $(".block-attach").css("bottom","-2px");
              };
            });

              // Добавление файла. С сайта ASM.
              $('#fileupload').on('change', function (event, files, label) {
                var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
                x = document.getElementById("fileupload");
                for (var i = 0; i < x.files.length; i++) {
                  $('.file-list').append("<div id='"+deleteId+"' class='attach-block-file'><span id='"+deleteId+"' class='close-document'>x</span>"+ x.files[i].name +"</div>");
                }
              });

                // Кнопка "Готово"
                $('#discuss-form').submit(function() {
                  if(!!form1.valid()){
                    // Блоки:форма и кнопки
                    $(".form-part-4").fadeOut(0);
                    $(".discuss-block-controls").fadeOut(0);
                    // Кнопки
                    $(".right-text-forward-4").css("display","none");
                    $(".left-text-forward-3").css("display","none");
                    // Заголовок
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

/*##########################*/
/* ФОРМА- ОБСУЖДЕНИЕ. КОНЕЦ */
/*##########################*/


/*###############################*/
/* ФОРМА - ЗАКАЗТЬ АУДИТ. НАЧАЛО */
/*###############################*/

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

// Кнопка назад. Аудит.
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

        // Кнопка submit. Аудит.
        $('#audit-form').submit(function() {
          if(!!form2.valid()){
            // Блоки: форма и кнопки.
            $(".form-audit-part-2").fadeOut(0);
            $(".audit-block-controls").fadeOut(0);
            // Кнопки
            $(".right-text-forward-6").css("display","none");
            $(".left-text-forward-4").css("display","none");
            // Заголовок
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

/*##############################*/
/* ФОРМА - ЗАКАЗТЬ АУДИТ. КОНЕЦ */
/*##############################*/


/*#########################################*/
/* НАСТРОЙКИ ФОРМ. ЭФФЕКТ INPUT'ов. НАЧАЛО */
/*#########################################*/ 
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

/*########################################*/
/* НАСТРОЙКИ ФОРМ. ЭФФЕКТ INPUT'ов. КОНЕЦ */
/*########################################*/ 


/*################################################*/
/* Три блока в footer'e. Эффект при hover. НАЧАЛО */
/*################################################*/

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

/*###############################################*/
/* Три блока в footer'e. Эффект при hover. КОНЕЦ */
/*###############################################*/


//Кнопка активации меню.
$(".uarr").click(function(){
  $(this).toggleClass("opened");
    $("nav").toggleClass("open");
    $(".openmenu-mask").toggle();
});

$(".menu-textmenu").click(function(){
  if($("nav").find("button").attr("class")=="opened tcon-transform"){
      $("nav").find("button").toggleClass("opened tcon-transform");
  }else{
      $("nav").find("button").toggleClass("opened tcon-transform");
  }
});

$(".item-discuss-text").click(function(){
  $("nav").find("button").removeClass("opened tcon-transform");
});

$(".discuss-window").click(function(){
  $("nav").find("button").removeClass("opened tcon-transform");
});