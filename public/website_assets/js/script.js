$(document).ready(function () {

  $('.open-sidebar').on('click', function () {
    $('.sidebar').addClass('opened-sidebar')
    $('.overlay').addClass('d-block')
  })

  $('.close-sidebar-btn').on('click', function () {
    $('.sidebar').removeClass('opened-sidebar')
     $('.overlay').removeClass('d-block')
  })

  // Set Slider height
  let windowH = $(window).innerHeight(),
    header = $("header").innerHeight(),
    navbar = $(".navbar").innerHeight();
  $("#carouselExampleControls").height(windowH - header - navbar);

  // Trigger Owl Carousel
  $("#owl-demo").owlCarousel({
    navigation: true,
    items: 6,
    rtl: true,
    loop: true,
    margin: 10,
    nav: true,
    dots: false,

    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // Add To Fav Button
  $(".item-assets button").on("click", function () {
    $(this).toggleClass("active");
  });

  $(".todayDeal").owlCarousel({
    //loop: true,
    nav: true,
    rtl: true,
    margin: 20,
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 6,
      },
    },
  });

  // Count Down For Flash Offers
  function CountDownTimer(dt, id, daysId, hoursId, minutesId, secondsId) {
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
      var now = new Date();
      var distance = end - now;
      if (distance < 0) {
        clearInterval(timer);
        document.getElementById(id).innerHTML = "EXPIRED!";

        return;
      }
      var days = Math.floor(distance / _day);
      var hours = Math.floor((distance % _day) / _hour);
      var minutes = Math.floor((distance % _hour) / _minute);
      var seconds = Math.floor((distance % _minute) / _second);

      //document.getElementById(daysId).innerHTML = days;
      //document.getElementById(hoursId).innerHTML = hours;
      //document.getElementById(minutesId).innerHTML = minutes;
      //document.getElementById(secondsId).innerHTML = seconds;
    }

    timer = setInterval(showRemaining, 1000);
  }

  CountDownTimer(
    "10/30/2023 10:10 AM",
    "countdown",
    "days",
    "hours",
    "minutes",
    "seconds"
  );
});
