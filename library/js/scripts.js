/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
	{
    // Let's see if we need to load selectivizr
    test : Modernizr.borderradius,
    // Modernizr.load loads selectivizr for IE6-8
    nope : ['selectivizr-min.js']
	}
]);



/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')"
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();}}}}

// add twitter bootstrap classes and color based on how many times tag is used
function addTwitterBSClass(thisObj) {
  var title = $(thisObj).attr('title');
  if (title) {
    var titles = title.split(' ');
    if (titles[0]) {
      var num = parseInt(titles[0]);
      if (num > 0)
      	$(thisObj).addClass('label');
      if (num == 2)
        $(thisObj).addClass('label notice');
      if (num > 2 && num < 4)
        $(thisObj).addClass('label success');
      if (num >= 5 && num < 10)
        $(thisObj).addClass('label warning');
      if (num >=10)
        $(thisObj).addClass('label important');
    }
  }
  else
  	$(thisObj).addClass('label');
  return true;
}

// as the page loads, cal these scripts
$(document).ready(function() {
    //wait 10 seconds and close the alert when u login
    setTimeout(function(){
	$('.welcome_message').alert('close');
    }, 10000);

    //Once the Header Images Load, Allow Scrolling to change Static Navigation to Fixed Navigation
    $('.masthead').imagesLoaded(function($images){
	//get the Height of the Header after Images are Loaded
	var header_height = $('.masthead').height();
	//Once the Window is scrolled passed the Navigation Make it Fixed.
	$(window).scroll(function() {
	    if (jQuery(window).scrollTop() > (header_height)){
		$('#inner-nav')
		    .removeClass('navbar-static')
		    .addClass('navbar-fixed')
		    .find('.container').removeClass('static-width')// Hack to Keep Navbar within 940px
		    .end()
		    .find('.pull-right').removeClass('hide')
		    .end()
		    .find('#user').css('display','block');
//		if(wrappedup.parent('#site-nav').length){
//			$(wrappedup).wrapAll('<ul class="dropdown-menu">','</ul>');
//			$('#site-nav > ul').wrapAll('<li class="dropdown"/>');
//			$('#site-nav > li.dropdown').prepend('<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sections<b class="caret"></b></a>');
//		}
	    }
	    else{
		$('#inner-nav').removeClass('navbar-fixed').addClass('navbar-static')
		    .find('.container').addClass('static-width')
		    .end()
		    .find('.pull-right').addClass('hide')
		    .end()
		    .find('#user').css('display','none');
//		    if(wrappedup.parent('.dropdown-menu').length){
//			$('#site-nav').find('a.dropdown-toggle').remove()
//			.end()
//			.find('ul.dropdown-menu').unwrap('<li class="dropdown"/>')
//			.end()
//			.find(wrappedup).unwrap('<ul class="dropdown-menu"/>');
//		}
	    }
	});
    });

    $("a[rel=popover]").popover();

	$("a[rel=twipsy]").twipsy();
	//Use Document for ScrollSpy Element
	$(document).scrollspy();

	//Make MyCarousel a Image Slider
	$('div[rel=Carousel]').carousel().click(function(e) {e.preventDefault()});


	// modify tag cloud links to match up with twitter bootstrap
	$("#tag-cloud a").each(function() {
	    addTwitterBSClass(this);
	    return true;
	});

	$("p.tags a").each(function() {
		addTwitterBSClass(this);
		return true;
	});

	$("ol.commentlist a.comment-reply-link").each(function() {
		$(this).addClass('btn success small');
		return true;
	});
	// Input placeholder text fix for IE
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
		input.val('');
		input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	  }
	}).blur();

	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
});

 /*end of as page load scripts */

