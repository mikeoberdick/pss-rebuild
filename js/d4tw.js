jQuery(function($){
  $(document).ready(function() {

/////////////////  PUSH DOWN FOOTER  \\\\\\\\\\\\\\\\\
$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

//NOW SHOWING ON ALL MODELS - DESKTOP
$( "#allModels .catButton" ).click(function() {
  $( "span#currentCat" ).text( $(this).text() + 's' );
});

//Add the search query on page load from url string to the "Currently Viewing:" section
var filters = document.location.hash.substring(1).split('&');
  if (filters) {
    var firstFilter = '.' + filters[0];
    var secondFilter = '.' + filters[1];
    $('[data-filter=' + '"' + firstFilter + '"' + ']').addClass('mixitup-control-active');
    $('[data-filter=' + '"' + secondFilter + '"' + ']').addClass('mixitup-control-active');
    var first = $('[data-filter=' + '"' + firstFilter + '"' + ']').text();
    var second = $('[data-filter=' + '"' + secondFilter + '"' + ']').text();
    $( "span#first" ).text(first);
    $( "span#second" ).text(second);
  }

//NOW SHOWING ON INVENTORY - DESKTOP
$( "#inventory #status .catButton" ).click(function() {
  $( "span#first" ).text( $(this).text() );
});
$( "#inventory #body .catButton" ).click(function() {
  $( "span#second" ).text( $(this).text() + 's' );
});

//NOW SHOWING ON ALL MODELS - MOBILE
$( "#allModels #mobileControls select" ).on('change', function(e){
  $( "span#currentCat" ).text( this.value + 's' );
});

//NOW SHOWING ON ALL INVENTORY - MOBILE
$( "#inventory #mobileStatus select" ).on('change', function(e){
  $( "span#first" ).text( $(this).find('option:selected').text() );
});
$( "#inventory #mobileBody select" ).on('change', function(e){
  $( "span#second" ).text( $(this).find('option:selected').text() + 's' );
});

//FULL CAR DIV CLICKABLE LINK
$('.link').on('click', function(e){
  e.preventDefault();
  window.location.href=$(this).data('link');
});

//Make each slide fully clickable on homepage featured slider
$('#homepage #sectionOne .slide').on('click', function(e){
  e.preventDefault();
  window.location.href=$(this).data('link');
});

//Make each related car fully clickable in related cars section
$('#singleCar #relatedCars .related-car').on('click', function(e){
  e.preventDefault();
  window.location.href=$(this).data('link');
});

//TOGGLE CHEVRON FLIP ON FAQ AUCTION QUESTIONS
$('#auctionContent .question').on( 'click', function() {
    $(this).find('.fa-chevron-down').toggleClass('rotate');
});

//Push page down to acommodate the fixed nav
var navHeight = $('.navbar').outerHeight();
$('.page-wrapper').css('padding-top', navHeight + 'px');

//SINGLE CAR PAGE GALLERY
//If thumb is last in gallery go to first one (after video)
$.fn.nextOrFirst = function (selector) {
  var next = this.next(selector);
  return next.length ? next : this.prevAll(selector).last();
};

//If thumb is first in gallery go to last one
$.fn.prevOrLast = function (selector) {
  var prev = this.prev(selector);
  return prev.length ? prev : this.nextAll(selector).last();
};

//Handle the video thumb
$(".video-thumb").click(function () {
  $("#imageViewer").addClass("d-none");
  $("#videoViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

//Handle the image thumbs
$("#singleCar .gallery-thumb").click(function () {
  var video = $("#videoViewer iframe").attr("src");
  $("#videoViewer iframe").attr("src","");
  $("#videoViewer iframe").attr("src",video);
  $("#videoViewer").addClass("d-none");
  $("#imageViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  //Need to remove the thumbnail size and add the larger size parameters
  var img = $(this).find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = $(this).find('img').attr('data-slide-to');
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

//Previous button functionality
$("#prev").click(function () {
  var prev = $(".selected").prevOrLast(".gallery-thumb");
  var img = prev.find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = prev.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  prev.addClass("selected");
});

//Next button functionality
$("#next").click(function () {
  var next = $(".selected").nextOrFirst(".gallery-thumb");
  var img = next.find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = next.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  next.addClass("selected");
});

//Load up the image last viewed in modal when close button was clicked
$('#exampleModal').on('hidden.bs.modal', function (e) {
  var currentIndex = $('.carousel-item.active').index();
  $('.gallery-thumb').eq(currentIndex).trigger('click');
});

//LOAD MORE PHOTOS IN Single Car GALLERY
$('#singleCar .more-photos').on( 'click', function() {
    $('#carGallery .gallery-thumb:gt(10)').toggleClass('hidden');
    $(this).find('h5 span').text(function(i, text){
          return text === "LESS PHOTOS" ? "MORE PHOTOS" : "LESS PHOTOS";
      })
    $(this).find('.fa-caret-down').toggleClass('rotate');
});

//LOAD MORE PHOTOS IN ALL GALLERY
$('#modelTaxonomy .more-photos').on( 'click', function() {
    //$(this).parent('.option-group .option:gt(1)').toggleClass('hidden');
    $(this).parent().parent().find('.option:gt(1)').toggleClass('hidden');
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

//Dynamically add the stock number and first image url to the Message Us form's hidden fields in order to send along in the notification emamil
var stock = $('#stock').text();
var image = $('#featuredImage').attr('src');
//Add the stock number
$("#nf-field-63").val(stock).trigger('change');
//Add the image url
$("#nf-field-64").val(image).trigger('change');

//Get the largest height of the featured cars and make them all match that height
var featuredHeights = $("#featuredSlider .car-wrapper").map(function() {
  return $(this).height();
  }).get();

var featuredMaxHeight = Math.max.apply(null, featuredHeights);
$('#featuredSlider .car-wrapper').each(function() {
  $(this).css('height', featuredMaxHeight + 'px');
});

//Get the largest height of the related cars and make them all match that height
$(window).on("load", function() {
  var relatedHeights = $("#relatedCars .car-wrapper").map(function() {
  return $(this).height();
  }).get();
var relatedMaxHeight = Math.max.apply(null, relatedHeights);
$('#relatedCars .car-wrapper').each(function() {
  $(this).css('height', relatedMaxHeight + 'px');
});
});

$(".car-wrapper > .embed-item").attr('src', $(".car-wrapper > .embed-item").attr('src'));

//end of document ready call
});

//end of file
});