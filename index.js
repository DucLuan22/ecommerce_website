$(document).ready(() => {
  $(window).scroll(() => {
    $(this).scrollTop() > 200
      ? $(".navbar").addClass("sticky")
      : $(".navbar").removeClass("sticky");
  });

  $(function () {
    $(".custom-dropdown").on("show.bs.dropdown", function () {
      var that = $(this);
      setTimeout(function () {
        that.find(".dropdown-menu").addClass("active");
      }, 100);
    });
    $(".custom-dropdown").on("hide.bs.dropdown", function () {
      $(this).find(".dropdown-menu").removeClass("active");
    });
  });

  // banner
  $(".banner").owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    rewind: true,
    autoplay: false,
    animateOut: "fadeOut",
    navText: [
      "<div class='nav-btn prev-slide'></div>",
      "<div class='nav-btn next-slide'></div>",
    ],

    responsive: {
      0: {
        items: 1,
      },
    },
  });

  $(".banner").on("changed.owl.carousel", (event) => {
    var item = event.item.index;
    console.log(item);
    $(".hero-title").removeClass("animate__backInRight");
    $(".hero-subtitle").removeClass("animate__backInRight");
    $(".hero-button").removeClass("animate__backInRight");
    $(".owl-item")
      .eq(item)
      .find(".hero-title")
      .addClass("animate__backInRight");
    $(".owl-item").eq(item).find(".hero-subtitle")
    .addClass("animate__backInRight")
    $(".owl-item").eq(item).find(".hero-button")
    .addClass("animate__backInRight")  
  });

  //featured laptop carousel
  $(".featured-laptop").owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    autoplay: true,
    rewind: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  //filter products
  var $grid = $(".grid").isotope({
    // options
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
    percentPosition: true,
  });

  $(".button-group").on("click", "button", (e) => {
    var button = e.currentTarget;
    var filterValue = button.getAttribute("data-filter");
    $grid.isotope({
      filter: filterValue,
    });
  });
});
