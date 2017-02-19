function initMap() {

  var yoshi = {lat: 49.282, lng: -123.115};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: yoshi,
      disableDefaultUI: true,
      styles: [
          {
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#f5f5f5"
              }
            ]
          },
          {
            "elementType": "labels.icon",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [
              {
                "color": "#f5f5f5"
              }
            ]
          },
          {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#bdbdbd"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "poi.business",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#ffffff"
              }
            ]
          },
          {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dadada"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#c9c9c9"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          }
        ]
    });
    var marker = new google.maps.Marker({
      position: yoshi,
      map: map,
      title: 'Yoshi',
      icon: 'images/marker.png'
    });
}

$(function(){
  //Header Menu
  $('.header-menu').click(function(){
    $('.nav-header').toggle(600);
  });

  $('.header-submenu').click(function(event){
    event.preventDefault();
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

//Slow Scroll

  $('.arrow-bounce a').click(function(event){
    event.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
    });
  });


//Prices Categories
  $(".prices-categories li").on({
    click: function() {
      let dataName = $(this).data().type;
      $('.price-box [class^="prices"]').hide();
      $('.price-box').find('.' + dataName).show('slow');
      $(".prices-categories li").removeClass('prices-active');
      $(this).addClass('prices-active');
    }
  });




});
