/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/datetime.js ***!
  \**********************************/
$('#statedAtDate').datetimepicker({
  format: 'L'
});
$('#finishedAtDate').datetimepicker({
  format: 'L'
});
$('#startedTime').datetimepicker({
  format: 'LT'
});
$('#finishedTime').datetimepicker({
  format: 'LT'
});
$('#statedAtDate').on("change.datetimepicker", function (e) {
  var date = $(this).data('statedatdate');
  eval(date).set('state.stated_at_date', $('#statedAtDateInput').val());
});
$('#finishedAtDate').on("change.datetimepicker", function (e) {
  var date = $(this).data('finishedatdate');
  eval(date).set('state.finished_at_date', $('#finishedAtDateInput').val());
});
$('#startedTime').on("change.datetimepicker", function (e) {
  var date = $(this).data('startedtime');
  eval(date).set('state.started_time', $('#startedTimeInput').val());
});
$('#finishedTime').on("change.datetimepicker", function (e) {
  var date = $(this).data('finishedtime');
  eval(date).set('state.finished_time', $('#finishedTimeInput').val());
});
/******/ })()
;