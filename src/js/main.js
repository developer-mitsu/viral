import "../scss/main.scss";
import "./hum.js";

$(function () {

  // 生徒の声下層ページリンク
  let students = ["#name1", "#name2", "#name3", "#name4"];
  students.forEach(function (value) {
    $(value).on('click', function () {
      location.href = $(this).attr('data-url');
    })
  })



  // footerスクロール→出てくる
  // var $footer = $('#js-scrollFt')
  // var accessPos = $('#access').scrollTop()
  // $footer.hide();
  // $(window).on('scroll', function () {
  //   console.log(currentPos)
  //   var startPos
  //   var currentPos = $(this).scrollTop()
  //   if (startPos < currentPos && currentPos - startPos >= 100) {
  //     $footer.slideUp('slow');
  //   } else if (startPos > currentPos) {
  //     $footer.slideDown('slow');
  //   }

  //   startPos = currentPos;
  //   console.log($(window).scrollTop())
  //   console.log(startPos)
  // });

  // ファーストビューボタンアニメーション
  $('.hdline--main-btn').on({
    'mouseenter': function () {
      $('.play-icon').addClass('hover');
    },
    'mouseleave': function () {
      $('.play-icon').removeClass('hover');
    }
  });

})

import "./slider.js";
