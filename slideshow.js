'use strict';

/*global $,jQuery,console,window*/
$(function(){
    var width = 1080;
    var slideNum=1;
    var $slideshow = $('#slideshow');
    var $slideContainer = $slideshow.find('.slides');
    var $slides = $slideContainer.find('.slide');
    setInterval(function(){
        $('#slideshow .slides').animate({'margin-left': '-='+width},3000, function(){
            slideNum++;
            //console.log($slides.length);
            console.log(slideNum);
            if(slideNum ===$slides.length){
                slideNum = 1;
                $slideContainer.css('margin-left',0);
            }
        });
    },5000);

});

