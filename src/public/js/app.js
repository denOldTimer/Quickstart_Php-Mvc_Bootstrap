'use strict'
import 'bootstrap'

const $ = require('jquery')

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip()
  $('.dropdown-toggle').dropdown()

  // >>>> Back To The Top Button
  $('#back-to-top').hide()
  var amountScrolled = 400
  $(window).scroll(function () {
    if ($(this).scrollTop() > amountScrolled) {
      $('#back-to-top').fadeIn()
    } else {
      $('#back-to-top').fadeOut()
    }
  })
  // on hover
  $('#back-to-top').hover(function () {
    $('#back-to-top').tooltip('show')
  })
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('#back-to-top').tooltip('hide')
    $('body,html').animate({ scrollTop: 0 }, 2000)
    return false
  })
  // <<<< Back To The Top Button
})
