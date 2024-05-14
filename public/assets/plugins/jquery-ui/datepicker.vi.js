;(function (factory) {
  'use strict'
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory)
  } else {
    factory(jQuery.datepicker)
  }
})(function (datepicker) {
  'use strict'

  datepicker.regional.vi = {
    closeText: '<i class="fa-solid fa-xmark"></i>',
    prevText: '<i class="fa-solid fa-chevron-left"></i>',
    nextText: '<i class="fa-solid fa-angle-right"></i>',
    currentText: '<i class="fa-solid fa-calendar-day"></i>',
    monthNames: [
      'Tháng 01',
      'Tháng 02',
      'Tháng 03',
      'Tháng 04',
      'Tháng 05',
      'Tháng 06',
      'Tháng 07',
      'Tháng 08',
      'Tháng 09',
      'Tháng 10',
      'Tháng 11',
      'Tháng 12',
    ],
    monthNamesShort: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
    dayNames: ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
    dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
    dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
    weekHeader: 'Tuần',
    dateFormat: 'yy/mm/dd',
    firstDay: 1,
    yearSuffix: '',
    autoHide: true,
  }
  datepicker.setDefaults(datepicker.regional.vi)

  return datepicker.regional.vi
})
