;(function (factory) {
  'use strict'
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory)
  } else {
    factory(jQuery.datepicker)
  }
})(function (datepicker) {
  'use strict'

  datepicker.regional.ja = {
    closeText: '<i class="fa-solid fa-xmark"></i>',
    prevText: '<i class="fa-solid fa-chevron-left"></i>',
    nextText: '<i class="fa-solid fa-angle-right"></i>',
    currentText: '<i class="fa-solid fa-calendar-day"></i>',
    monthNames: ['01月', '02月', '03月', '04月', '05月', '06月', '07月', '08月', '09月', '10月', '11月', '12月'],
    monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
    dayNamesShort: ['日曜', '月曜', '火曜', '水曜', '木曜', '金曜', '土曜'],
    dayNamesMin: ['日', '月', '火', '水', '木', '金', '土'],
    weekHeader: '週',
    dateFormat: 'yy/mm/dd',
    firstDay: 0,
    yearSuffix: '',
    autoHide: true,
  }
  datepicker.setDefaults(datepicker.regional.ja)

  return datepicker.regional.ja
})
