/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/orders/create.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/orders/create.js ***!
  \*********************************************/
/***/ (() => {

eval("var ORDER = {\n  init: function init() {\n    this.addMoreProductRow();\n    this.removeProductRow();\n  },\n  addMoreProductRow: function addMoreProductRow() {\n    $('.add-row-product').click(function () {\n      var html = \"<div class=\\\"form-row row-product\\\">\\n                            <div class=\\\"col-sm-3 my-1\\\">\\n                                <input type=\\\"text\\\" class=\\\"form-control\\\" name=\\\"product_codes[]\\\" placeholder=\\\"M\\xE3 s\\u1EA3n ph\\u1EA9m\\\" required>\\n                            </div>\\n                            <div class=\\\"col-sm-3 my-1\\\">\\n                                <input type=\\\"number\\\" min=\\\"1\\\" class=\\\"form-control\\\" name=\\\"product_quantitys[]\\\" placeholder=\\\"S\\u1ED1 l\\u01B0\\u1EE3ng\\\" required>\\n                            </div>\\n                            <div class=\\\"col-sm-2 my-1 delete-row-product\\\">\\n                                <i class=\\\"fas fa-trash\\\"></i>\\n                            </div>\\n                        </div>\";\n      $('.list-row-product').append(html);\n      if ($('.row-product').length > 1) {\n        $('.row-product .delete-row-product').removeClass('d-none');\n      }\n    });\n  },\n  removeProductRow: function removeProductRow() {\n    $(document).on('click', '.delete-row-product', function () {\n      $(this).parents('.row-product').remove();\n      if ($('.row-product').length == 1) {\n        $('.row-product .delete-row-product').addClass('d-none');\n      }\n    });\n  }\n};\n$(function () {\n  ORDER.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvb3JkZXJzL2NyZWF0ZS5qcy5qcyIsIm5hbWVzIjpbIk9SREVSIiwiaW5pdCIsImFkZE1vcmVQcm9kdWN0Um93IiwicmVtb3ZlUHJvZHVjdFJvdyIsIiQiLCJjbGljayIsImh0bWwiLCJhcHBlbmQiLCJsZW5ndGgiLCJyZW1vdmVDbGFzcyIsImRvY3VtZW50Iiwib24iLCJwYXJlbnRzIiwicmVtb3ZlIiwiYWRkQ2xhc3MiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9wYWdlcy9vcmRlcnMvY3JlYXRlLmpzPzNkYTciXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgT1JERVIgPSB7XG4gICAgaW5pdCgpIHtcbiAgICAgICAgdGhpcy5hZGRNb3JlUHJvZHVjdFJvdygpO1xuICAgICAgICB0aGlzLnJlbW92ZVByb2R1Y3RSb3coKTtcbiAgICB9LFxuXG4gICAgYWRkTW9yZVByb2R1Y3RSb3coKSB7XG4gICAgICAgICQoJy5hZGQtcm93LXByb2R1Y3QnKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBsZXQgaHRtbCA9IGA8ZGl2IGNsYXNzPVwiZm9ybS1yb3cgcm93LXByb2R1Y3RcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiY29sLXNtLTMgbXktMVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInRleHRcIiBjbGFzcz1cImZvcm0tY29udHJvbFwiIG5hbWU9XCJwcm9kdWN0X2NvZGVzW11cIiBwbGFjZWhvbGRlcj1cIk3DoyBz4bqjbiBwaOG6qW1cIiByZXF1aXJlZD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiY29sLXNtLTMgbXktMVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cIm51bWJlclwiIG1pbj1cIjFcIiBjbGFzcz1cImZvcm0tY29udHJvbFwiIG5hbWU9XCJwcm9kdWN0X3F1YW50aXR5c1tdXCIgcGxhY2Vob2xkZXI9XCJT4buRIGzGsOG7o25nXCIgcmVxdWlyZWQ+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNvbC1zbS0yIG15LTEgZGVsZXRlLXJvdy1wcm9kdWN0XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpIGNsYXNzPVwiZmFzIGZhLXRyYXNoXCI+PC9pPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+YDtcbiAgICAgICAgICAgIFxuICAgICAgICAgICAgJCgnLmxpc3Qtcm93LXByb2R1Y3QnKS5hcHBlbmQoaHRtbCk7XG4gICAgICAgICAgICBpZiAoJCgnLnJvdy1wcm9kdWN0JykubGVuZ3RoID4gMSkge1xuICAgICAgICAgICAgICAgICQoJy5yb3ctcHJvZHVjdCAuZGVsZXRlLXJvdy1wcm9kdWN0JykucmVtb3ZlQ2xhc3MoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgcmVtb3ZlUHJvZHVjdFJvdygpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5kZWxldGUtcm93LXByb2R1Y3QnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAkKHRoaXMpLnBhcmVudHMoJy5yb3ctcHJvZHVjdCcpLnJlbW92ZSgpO1xuICAgICAgICAgICAgaWYgKCQoJy5yb3ctcHJvZHVjdCcpLmxlbmd0aCA9PSAxKSB7XG4gICAgICAgICAgICAgICAgJCgnLnJvdy1wcm9kdWN0IC5kZWxldGUtcm93LXByb2R1Y3QnKS5hZGRDbGFzcygnZC1ub25lJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH1cbn1cblxuJChmdW5jdGlvbiAoKSB7XG4gICAgT1JERVIuaW5pdCgpO1xufSk7XG5cblxuIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFNQSxLQUFLLEdBQUc7RUFDVkMsSUFBSSxXQUFBQSxLQUFBLEVBQUc7SUFDSCxJQUFJLENBQUNDLGlCQUFpQixFQUFFO0lBQ3hCLElBQUksQ0FBQ0MsZ0JBQWdCLEVBQUU7RUFDM0IsQ0FBQztFQUVERCxpQkFBaUIsV0FBQUEsa0JBQUEsRUFBRztJQUNoQkUsQ0FBQyxDQUFDLGtCQUFrQixDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFZO01BQ3BDLElBQUlDLElBQUksMHZCQVVXO01BRW5CRixDQUFDLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0csTUFBTSxDQUFDRCxJQUFJLENBQUM7TUFDbkMsSUFBSUYsQ0FBQyxDQUFDLGNBQWMsQ0FBQyxDQUFDSSxNQUFNLEdBQUcsQ0FBQyxFQUFFO1FBQzlCSixDQUFDLENBQUMsa0NBQWtDLENBQUMsQ0FBQ0ssV0FBVyxDQUFDLFFBQVEsQ0FBQztNQUMvRDtJQUNKLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRE4sZ0JBQWdCLFdBQUFBLGlCQUFBLEVBQUc7SUFDZkMsQ0FBQyxDQUFDTSxRQUFRLENBQUMsQ0FBQ0MsRUFBRSxDQUFDLE9BQU8sRUFBRSxxQkFBcUIsRUFBRSxZQUFZO01BQ3ZEUCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNRLE9BQU8sQ0FBQyxjQUFjLENBQUMsQ0FBQ0MsTUFBTSxFQUFFO01BQ3hDLElBQUlULENBQUMsQ0FBQyxjQUFjLENBQUMsQ0FBQ0ksTUFBTSxJQUFJLENBQUMsRUFBRTtRQUMvQkosQ0FBQyxDQUFDLGtDQUFrQyxDQUFDLENBQUNVLFFBQVEsQ0FBQyxRQUFRLENBQUM7TUFDNUQ7SUFDSixDQUFDLENBQUM7RUFDTjtBQUNKLENBQUM7QUFFRFYsQ0FBQyxDQUFDLFlBQVk7RUFDVkosS0FBSyxDQUFDQyxJQUFJLEVBQUU7QUFDaEIsQ0FBQyxDQUFDIn0=\n//# sourceURL=webpack-internal:///./resources/js/pages/orders/create.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/orders/create.js"]();
/******/ 	
/******/ })()
;