jQuery(function($){
	$(document).ready(function() {

/////////////////  NO FOLLOW ON STAGING  \\\\\\\\\\\\\\\\\
if ( window.location.href.indexOf("captchaintherye.com") > -1 ) {
	console.log('on captcha');
} else if ( window.location.href.indexOf(".d4tw") > -1) {
	console.log('on d4tw');
	//alert('NEED TO UPDATE WP CONFIG FILE DB SETTINGS');
	}
else {
	alert('NEED TO REMOVE NOINDEX FROM HEADER & THIS LINE FROM JS');
}


/////////////////  PUSH DOWN FOOTER  \\\\\\\\\\\\\\\\\
$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

//NOW SHOWING ON ALL MODELS PAGE
$( ".catButton" ).click(function() {
	$( "span#currentCat" ).text( $(this).text() + 's' );
});

//FULL CAR DIV CLICKABLE LINK
$('.car article').on('click', function(e){
  e.preventDefault();
  window.location.href=$(this).data('link');
});

//TOGGLE CHEVRON FLIP ON FAQ AUCTION QUESTIONS
$('#auctionContent .question').on( 'click', function() {
    $(this).find('.fa-chevron-down').toggleClass('rotate');
});

//Push page down to acommodate the fixed nav
var navHeight = ( $('#wrapper-navbar').height() );
$('.page-wrapper').css('padding-top', navHeight);

//Image gallery functionality on single car page

$.fn.nextOrFirst = function (selector) {
  var next = this.next(selector);
  return next.length ? next : this.prevAll(selector).last();
};

$.fn.prevOrLast = function (selector) {
  var prev = this.prev(selector);
  return prev.length ? prev : this.nextAll(selector).last();
};

$(".video-thumb").click(function () {
  $("#imageViewer").addClass("d-none");
  $("#videoViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

$(".gallery-thumb").click(function () {
  var video = $("#videoViewer iframe").attr("src");
  $("#videoViewer iframe").attr("src","");
  $("#videoViewer iframe").attr("src",video);
  $("#videoViewer").addClass("d-none");
  $("#imageViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  var img = $(this).find("img").attr("src");
  var index = $(this).find('img').attr('data-slide-to');
  $("#imageViewer #featuredImage").attr({"src": img, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

$("#prev").click(function () {
  var prev = $(".selected").prevOrLast(".gallery-thumb");
  var img = prev.find("img").attr("src");
  var index = prev.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": img, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  prev.addClass("selected");
});

$("#next").click(function () {
  var next = $(".selected").nextOrFirst(".gallery-thumb");
  var img = next.find("img").attr("src");
  var index = next.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": img, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  next.addClass("selected");
});

//Load up the image last viewed in modal when close button was clicked
//Use on modal close to set the .selected class on that thumb and also set the src for the featured image
$('#exampleModal').on('hidden.bs.modal', function (e) {
  var currentIndex = $('.carousel-item.active').index();
  $('.gallery-thumb').eq(currentIndex).trigger('click');
})


//LOAD MORE PHOTOS IN Single Car GALLERY
$('.more-photos').on( 'click', function() {
    $('#carGallery .gallery-thumb:gt(10)').toggleClass('hidden');
    $(this).find('h5 span').text(function(i, text){
          return text === "LESS PHOTOS" ? "MORE PHOTOS" : "LESS PHOTOS";
      })
    $(this).find('.fa-caret-down').toggleClass('rotate');
});

//Image carousel on All models page
$('#primaryCarousel .gallery-thumb img').click(function(){
    $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
});

//Alternate Image Carousel on All Models Page
$('#secondaryCarousel .gallery-thumb img').click(function(){
    $('#altLargeImage').attr('src',$(this).attr('src').replace('thumb','large'));
});



//end of document ready call
});

//end of file
});