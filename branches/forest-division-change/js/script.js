/*
	Standards Compliant Rollover Script
	Author : Daniel Nolan
	http://www.bleedingego.co.uk/webdev.php
*/

function initRollovers() {
	if (!document.getElementById) return
	
	var aPreLoad = new Array();
	var sTempSrc;
	var aImages = document.getElementsByTagName('img');

	for (var i = 0; i < aImages.length; i++) {		
		if (aImages[i].className == 'rollover' || aImages[i].className == 'rollover middle') {
			var src = aImages[i].getAttribute('src');
			var ftype = src.substring(src.lastIndexOf('.'), src.length);
			var hsrc = src.replace(ftype, '_over'+ftype);

			aImages[i].setAttribute('hsrc', hsrc);
			
			aPreLoad[i] = new Image();
			aPreLoad[i].src = hsrc;
			
			aImages[i].onmouseover = function() {
				sTempSrc = this.getAttribute('src');
				this.setAttribute('src', this.getAttribute('hsrc'));
			}	
			
			aImages[i].onmouseout = function() {
				if (!sTempSrc) sTempSrc = this.getAttribute('src').replace('_over'+ftype, ftype);
				this.setAttribute('src', sTempSrc);
			}
		}
	}
}

window.onload = initRollovers;


jQuery(document).ready(function(){
	

/*// ROLLOVERS

	//preload images
	var preloadedImages = new Array();
	
	$('.rollover').each(function(i) {
		
		preloadedImages[i] = new Image();
		var ext = $(this).attr('src').split('.').pop();
		preloadedImages[i].src = $(this).attr('src').split('.' + ext).join('_over.' + ext);
		
	});
	
	//rollover effect
	$('.rollover').hover(function() {
		
		var ext = $(this).attr('src').split('.').pop();
		$(this).attr('src', $(this).attr('src').split('.' + ext).join('_over.' + ext));
		
	}, function() {
		
		var ext = $(this).attr('src').split('.').pop();
		$(this).attr('src', $(this).attr('src').split('_over.' + ext).join('.' + ext));
		
	});*/
	
	 //preload images

	
	
	

	

	


// SLIDESHOW		
		
		$(function() {

    $('#slideshow').cycle({

      	slideExpr: 'img',
	    pager:  '#slide-nav',

        before: function() { if (window.console) console.log(this.src); }

    });

});


// FORM VALIDATION

	
$.validator.addMethod('letters', function(value) {
	return value.match(/^[- a-zA-Z]+$/);
});

$.validator.addMethod('phonenumber', function(value) {
	return value.match(/^[+ 0-9]+$/);
});

$('#form').validate({
    rules : {
		Name : {
            required : true,
            letters : true
        },
		Email :  {
            required : true,
            email : true
        },
		Telephone :  {
            required : true,
            phonenumber : true,
            minlength : 11,
            maxlength : 14
        },
		Enquiry : {
            required : true
        }
		
	},
    messages : {
		Name : {
            required : 'The name field cannot be blank',
            letters : 'Please enter letters only'
        },
		Email :  {
            required : 'The email field cannot be blank',
            email : 'Please enter a valid email address'
        },
		Telephone :  {
            required : 'The telephone field cannot be blank',
            phonenumber : 'Please enter numbers only',
            minlength : 'Please enter a UK phone number (11 digits)',
            maxlength : 'Please enter a UK phone number (11 digits)'
        },
		Enquiry : {
            required : 'The message field cannot be blank',
            
        }
    }
});
 
});




$(function() {
		$( "#accordion" ).accordion({
			collapsible: true,
			autoHeight: false,
			navigation: true,
			active:false	
			
		});
		
	});

	
	
	
