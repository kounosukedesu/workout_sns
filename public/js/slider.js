/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/slider.js":
/*!********************************!*\
  !*** ./resources/js/slider.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

//画像スライドの処理
var slideShow = function slideShow() {
  // 画像1枚以上3枚未満の時の処理
  for (var itemIndex = 0; itemIndex < 3; itemIndex++) {
    if (document.querySelectorAll('img')[itemIndex].getAttribute('src') === "") {
      document.querySelectorAll('.slideShow ul.slider li')[itemIndex].remove();
    } else {
      document.querySelectorAll('.slideShow ul.slider li')[itemIndex].style.display = '';
    }
  }

  var images = document.querySelectorAll('.slideShow ul.slider li'),
      imagesLength = images.length - 1,
      next = document.querySelector('.slideShow .btn-next'),
      prev = document.querySelector('.slideShow .btn-prev');
  var cnt = 0;

  function showNext() {
    if (cnt >= imagesLength) {
      cnt = 0;
      images.item(cnt).classList.add('slider-item01');
      images.item(imagesLength).classList.remove('slider-item01');
    } else {
      images.item(cnt).classList.remove('slider-item01');
      images.item(cnt + 1).classList.add('slider-item01');
      cnt += 1;
    }
  }

  function showPrev() {
    if (cnt === 0) {
      images.item(cnt).classList.remove('slider-item01');
      images.item(imagesLength).classList.add('slider-item01');
      cnt = imagesLength;
    } else {
      images.item(cnt).classList.remove('slider-item01');
      images.item(cnt - 1).classList.add('slider-item01');
      cnt -= 1;
    }
  }

  next.addEventListener('click', showNext);
  prev.addEventListener('click', showPrev);
}; // 画像未保存の時の処理


var img = document.querySelectorAll('img');

if (img[0].getAttribute('src') === "" && img[1].getAttribute('src') === "" && img[2].getAttribute('src') === "") {
  document.querySelectorAll('.slideShow')[0].remove();
} else if (img[1].getAttribute('src') === "" && img[2].getAttribute('src') === "") {
  document.querySelector('.slideShow .btn-next').remove();
  document.querySelector('.slideShow .btn-prev').remove();
} else {
  slideShow();
}

/***/ }),

/***/ 3:
/*!**************************************!*\
  !*** multi ./resources/js/slider.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/blog/resources/js/slider.js */"./resources/js/slider.js");


/***/ })

/******/ });