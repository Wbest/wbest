   $(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
        $('.start-page').slideUp(1000);
        $('.content-header').css('background-attachment', 'fixed');
     }
    else
     {
      $('.start-page').slideDown(1000);
     }
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

$("a").click(function(){
  $(this).toggleClass("opened");
    $("nav").toggleClass("open");
      $(".nav-place-menu").toggleClass("transform");
});

/*!
 * jquery.parallaxmouse
 * 
 * @author Wil Neeley <william.neeley@gmail.com> (https://github.com/Xaxis)
 * @version 1.0.0
 * @license MIT
 */
!function(a,b,c,d){"use strict";function e(b,c){this._name=f,this._defaults=g,this.element=b,this.options=a.extend({},g,c),this.init()}var f="parallaxmouse",g={range:100,elms:[],invert:!1};a.extend(e.prototype,{init:function(){this.element=a(this.element),this.setInitialPositions(this.options.elms),this.parallaxElms(this.options.elms)},setInitialPositions:function(){a(this.options.elms).each(function(a,b){var c=b.el.position();b.el.hasClass("left")?(b.x=c.left,b.left=!0):(b.x=parseInt(b.el.css("right").replace("px")),b.left=!1),b.el.hasClass("top")?(b.y=c.top,b.top=!0):(b.y=parseInt(b.el.css("bottom").replace("px")),b.top=!1)})},parallaxElms:function(){var b=this;this.element.on("mousemove",function(c){var d=b.element.outerWidth(),e=b.element.outerHeight(),f=c.clientX,g=c.clientY,h=f/d,i=g/e;a(b.options.elms).each(function(a,c){var d=b.options.invert,e=b.options.range*h,f=b.options.range*i,g=d?c.x+e:c.x-e,j=d?c.y+f:c.y-f,k=g*c.rate,l=j*c.rate;c.left?c.el.css("left",c.x+-1*k):c.el.css("right",c.x+k),c.top?c.el.css("top",c.y+-1*l):c.el.css("bottom",c.y+l)})})}}),a.fn[f]=function(b){return this.each(function(){a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))})}}(jQuery,window,document);

jQuery(window).parallaxmouse({
    invert: true,
    range: 400,
    elms: [
        {el: $('#layer-1'), rate: 0.2},
        {el: $('#layer-2'), rate: 0.2},
        {el: $('#layer-3'), rate: 0.2},
        {el: $('#layer-4'), rate: 0.2}
    ]
});


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