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

//LOAD MORE PHOTOS IN GALLERY
$('.more-photos').on( 'click', function() {
    $('#carGallery .gallery-photo:gt(12)').toggleClass('hidden');
    $(this).find('h5 span').text(function(i, text){
          return text === "LESS PHOTOS" ? "MORE PHOTOS" : "LESS PHOTOS";
      })
    $(this).find('.fa-caret-down').toggleClass('rotate');
});

//NOW SHOWING ON ALL MODELS PAGE
$( ".catButton" ).click(function() {
	$( "span#currentCat" ).text( jQuery(this).text() );
});

//FULL CAR DIV CLICKABLE LINK
$('.car article').on('click', function(e){
  e.preventDefault();
  window.location.href=$(this).data('link');
});

//MAKE SURE TO INCLUDE THE DATA-LINK ATTRIBUTE WITH THE URL


//end of document ready call
});

//end of file
});