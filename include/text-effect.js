// JavaScript Document
$(document).ready(function () {
 
 
    //custom jquery plugin loadText()
    $.fn.loadText = function (textArray, interval) {
        return this.each(function () {
            var obj = $(this);
            obj.fadeOut('slow', function () {
                var elem = textArray[0];
                obj.empty().html(elem);
                textArray.shift();
                textArray.push(elem);
                obj.fadeIn('slow');
            });
            timeOut = setTimeout(function () { obj.loadText(textArray, interval) }, interval);
        });
		
    };
 
    //array for nav
    var helloArray =
        [
           
            "The doctor of the future will give no medicine but will interest the patient in the care of the human frame, in diet, and in the cause and prevention of disease. –Thomas Edison   ",
            "The nervous system holds the key to the body's incredible potential to heal itself.",
			"health: a state of complete physical, mental and social well-being and not merely the absence of disease or infirmity. ",
        ];
    //load text into text effect
    $('#effect-text').loadText(helloArray, 12000); // ( array, interval )
    document.title = $('#page_title').text();
 
 
	//toggle function on responsive nav
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 600 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});

 
 
 
   
 
 
});