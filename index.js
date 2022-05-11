$(document).ready(() => {
  $(window).scroll(() => {
    $(this).scrollTop() > 200
      ? $(".navbar").addClass("sticky")
      : $(".navbar").removeClass("sticky");
  });

  $(".categori-button-active").on("click", function () {
    $(".categori-dropdown-active-large").toggleClass("open");
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

  //wishlist
  $(".wishlist").each((index, obj) => {
    $(obj).click(function () {
      $(this).children(".heart").toggleClass("fa-heart fa-heart-o");
    });
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
