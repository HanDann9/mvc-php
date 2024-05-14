;(function (factory) {
  'use strict'
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory)
  } else {
    factory(jQuery.datepicker)
  }
})(function (datepicker) {
  'use strict'

  datepicker.regional.ko = {
    closeText: '<i class="fa-solid fa-xmark"></i>',
    prevText: '<i class="fa-solid fa-chevron-left"></i>',
    nextText: '<i class="fa-solid fa-angle-right"></i>',
    currentText: '<i class="fa-solid fa-calendar-day"></i>',
    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    weekHeader: '주',
    dateFormat: 'yy/mm/dd',
    firstDay: 1,
    yearSuffix: '',
    autoHide: true,
  }
  datepicker.setDefaults(datepicker.regional.ko)

  return datepicker.regional.ko
})
