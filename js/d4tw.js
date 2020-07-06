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

//Image carousel
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