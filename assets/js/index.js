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
    autoplay: true,
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
    $(".hero-title").removeClass("animate__backInRight");
    $(".hero-subtitle").removeClass("animate__backInRight");
    $(".hero-button").removeClass("animate__backInRight");
    $(".owl-item")
      .eq(item)
      .find(".hero-title")
      .addClass("animate__backInRight");
    $(".owl-item")
      .eq(item)
      .find(".hero-subtitle")
      .addClass("animate__backInRight");
    $(".owl-item")
      .eq(item)
      .find(".hero-button")
      .addClass("animate__backInRight");
  });
  //wishlist
  $(".wishlist").click(function () {
    $(".heart").toggleClass("fa-heart fa-heart-o");
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
  // quick search regex
  var qsRegex;

  var $grid = $(".grid").isotope({
    // options
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
    percentPosition: true,
  });

  // use value of search field to filter
  var $quicksearch = $(".search-input").keyup(
    debounce(function () {
      qsRegex = new RegExp($quicksearch.val(), "gi");
      $grid.isotope({
        filter: function () {
          return qsRegex ? $(this).text().match(qsRegex) : true;
        },
      });
    }, 200)
  );

  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
      clearTimeout(timeout);
      var args = arguments;
      var _this = this;
      function delayed() {
        fn.apply(_this, args);
      }
      timeout = setTimeout(delayed, threshold);
    };
  }

  $("select#brands").on("change", function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $grid.isotope({
      filter: valueSelected,
    });
  });
});
