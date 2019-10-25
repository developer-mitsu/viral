// import "../scss/main.scss";
// import "slick-carousel/slick/slick.css";
// import "../scss/slick.scss";
// こちらはメソッド読み込みのimport
import slick from "slick-carousel";

$(".slide-container").slick({
  dots: true,
  // dotsClass: slideDots,
  centerMode: true,
  arrow: true,
  infinite: true,
  centerPadding: "0px",
  slidesToShow: 3,
  // appendArrows: $('.slide-container'),
  prevArrow: '<div class="slider-arrow slider-prev fas fa-chevron-left"></div>',
  nextArrow: '<div class="slider-arrow slider-next fas fa-chevron-right"></div>',
  responsive: [
    {
      breakpoint: 980,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: "0px",
        slidesToShow: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: "0px",
        slidesToShow: 1
      }
    }
  ]
});
