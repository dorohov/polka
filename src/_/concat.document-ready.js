$(function(){var e="noname-browser",o=navigator.userAgent.toLowerCase();o.indexOf("msie")!=-1&&(e="msie"),o.indexOf("trident")!=-1&&(e="msie"),o.indexOf("konqueror")!=-1&&(e="konqueror"),o.indexOf("firefox")!=-1&&(e="firefox"),o.indexOf("safari")!=-1&&(e="safari"),o.indexOf("chrome")!=-1&&(e="chrome"),o.indexOf("chromium")!=-1&&(e="chromium"),o.indexOf("opera")!=-1&&(e="opera"),o.indexOf("yabrowser")!=-1&&(e="yabrowser"),$("html").eq(0).addClass(e)}),$(function(){$(document.body).on("keydown",function(e){e.stopPropagation(),$(document.body).trigger("fecss.keydown",[{alt:e.altKey,ctrl:e.ctrlKey,shift:e.shiftKey,meta:e.metaKey,key:e.which,liter:String.fromCharCode(e.which)}])})}),$(function(){});
$(document.body).on("click.fecss.go-to-top",".go-to-top",function(o){o.preventDefault(),$("html, body").animate({scrollTop:0},777)});
var tim;$(".page-loader .close-loader").on("click",function(e){e.preventDefault(),clearTimeout(tim),$(".page-loader").data("window-can-close-it",!0).data("counter-can-close-it",!0).trigger("fecss.can-close-it").removeClass("active").addClass("ready")}),$(document.body).on("fecss.can-close-it",".page-loader",function(e){e.preventDefault();var a=$(this);a.data("counter-can-close-it")&&a.data("window-can-close-it")&&setTimeout(function(){if(a.removeClass("active").addClass("ready"),$(".site-wrap").removeClass("is--hidden").addClass("is--ready"),$(document.body).find(".page-loader").length>0){var e=new WOW({boxClass:"wow",animateClass:"animated",mobile:!1});e.init()}},85)}),$(window).on("load",function(e){"#contacts-scroll"==window.location.href&&$(".page-loader").data("counter-can-close-it",!0),$(".page-loader").data("window-can-close-it",!0).trigger("fecss.can-close-it"),$(".page-loader ._czr__preloader-process-container ._czr__preloader-process-level").data("fast-page-loading",!0)}),$(function(){var e=$(".page-loader.active");$("._czr__preloader-process-container ._czr__preloader-process-level",e).eq(0);"#contacts-scroll"==window.location.hash?e.data("counter-can-close-it",!0).data("window-can-close-it",!0).removeClass("active"):tim=setTimeout(function(){$(".page-loader").data("counter-can-close-it",!0).trigger("fecss.can-close-it")},2e3)});
$(document.body).on("click.fecss.scrollto",".scrollto",{},function(t){t.preventDefault(),console.log("body trigger:click.fecss.scrollto");var o=$(this),l=$(o.attr("href")).eq(0),e=parseInt(o.attr("data-scrollto-diff"))||0,r=parseInt(o.attr("data-scrollto-speed"))||777;$("html, body").animate({scrollTop:l.offset().top+e},r)});
$(".catalog-element").on("mouseover",function(){$(this).toggleClass("is--hover")}),$(".catalog-element").on("mouseout",function(){$(this).toggleClass("is--hover")});
$("img").addClass("img-responsive"),$(".text-block ul").addClass("ul-site"),$(".project-step-panel__item-note ul").addClass("ul-site"),$(".text-block table").addClass("table table-bordered"),$(".text-block .table.table-bordered").parent().addClass("table-responsive"),$(".text-block img").parent().addClass("_tb__img"),$("._acb__item ul").addClass("ul-site");
var url=window.location.pathname;$('.navbar__nav a[href="'+url+'"]').parent().addClass("is--active"),$(function(){function a(){var a=$(".navbar-site .navbar__form.is--active");a.find("input").val(""),a.removeClass("is--active")}$('body, .navbar-site .navbar__form button[type="reset"]').on("click keyup",function(t){(27==t.which&&$(".navbar-site .navbar__form").hasClass("is--active")||"reset"==$(t.currentTarget).attr("type"))&&a()}),$(document).on("click",'.navbar-site .navbar__form:not(.is--active) button[type="submit"]',function(a){a.preventDefault();var t=$(this).closest("form"),n=t.find("input");t.addClass("is--active"),n.focus()})});