$(document).ready(function () {
  if ($("body").css("direction") == "rtl") {
    $(".fa-star-half-stroke").addClass("flip");
  }
  $(".thumbnail").on("mouseover", function () {
    $(".thumbnail").removeClass("active");
    $(this).toggleClass("active");
    var src = $(this).attr("src");
    $("#featured").attr("src", src);
  });
  $(".fa-circle-minus").on("click", function () {
    let quantityCcount = $("#quantity-count").text();
    if (quantityCcount > 1) {
      $("#quantity-count").text(quantityCcount - 1);
    }
  });

  $(".available-colors > div").on("click", function () {
    $(this).siblings().html("");

    $(this).html(
      "<i class='fa-solid fa-circle-check text-white text-center'></i>"
    );
  });
  $("#text-section .available-sizes > div").on("click", function () {
    $(this).toggleClass("active");
    $(this).siblings().removeClass("active");
  });

  $(".fa-circle-plus").on("click", function () {
    let quantityCcount = $("#quantity-count").text();

    $("#quantity-count").text(parseInt(quantityCcount) + 1);
  });
  $(".item-assets button").on("click", function () {
    $(this).toggleClass("active");
  });

  $('.close-filter').on('click' , () => {
        $('.tasnef-filter').css('right' , '-100%')
      })
      
  $('.filter-btn').on('click' , () => {
    $('.tasnef-filter').css('right', 0)
    console.log('ddd')
  })
});
