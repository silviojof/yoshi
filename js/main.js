$(function(){
  //Header Menu
  $('.header-menu').click(function(){
    $('.nav-header').toggle(600);
  });

  $('.header-submenu').click(function(){
    $('.header-nested').toggle(600);
    if($(this).find('i').hasClass('fa fa-plus')) {
      $(this).find('i').removeClass().addClass('fa fa-minus');
    } else {
      $(this).find('i').removeClass().addClass('fa fa-plus');
    }
  });

  //slider
  var settings = {
 // Images ('url': 'position').
   images: {
     'images/slider01.jpg': 'center',
     'images/slider02.jpg': 'center',
     'images/slider03.jpg': 'center',
     'images/slider04.jpg': 'center',
     'images/slider05.jpg': 'center'
   },
   // Delay.
     delay: 6000
 };

 // Create a div with the class of 'slider-bg' and append it to slider-box
 $('.slider-box').append('<div class="slider-bg"></div>');

 // Iterate through the images object and generate a new div for each image and set it as background and append it to the slider-bg
 $.each(settings.images, function(key, value){
   let image = $('<div class="slider-img"></div>').css({'backgroundImage': 'url(' + key +')', 'backgroundPosition': settings.images[key]});
   $('.slider-bg').append(image);
 });

 // Add a class of visible to the first image
 $('.slider-img').first().addClass('visible');

 // Set an interval to loop though all images adding the class of visible
 setInterval(function(){
       var next = $(".slider-img.visible").removeClass("visible").next(".slider-img");
       if (!next.length) {
           next = $(".slider-img:first");
       }
       next.addClass("visible");
   }, settings.delay);

//SLow Scroll

  $('.arrow-bounce a').click(function(event){
    event.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
    });
  });


$('.gallery-img').hover(function(){
  $(this).find('.shadow').fadeIn(1000);
}, function() {
  $('.shadow').hide();
});


});
