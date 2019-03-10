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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/validations/registerValidation.js":
/*!********************************************************!*\
  !*** ./resources/js/validations/registerValidation.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('#register_form').on('submit', function (e) {
    validate_form(e);
  });
});

function validate_name_empty() {
  var validated = true;

  if ($('#name').val() === "") {
    validated = false;
  }

  return validated;
}

function validate_email_empty() {
  var validated = true;

  if ($('#mail').val() === "") {
    validated = false;
  }

  return validated;
}

function validate_password_empty() {
  var validated = true;

  if ($('#pass').val() === "") {
    validated = false;
  }

  return validated;
}

function validate_password_confirm_empty() {
  var validated = true;

  if ($('#password_confirm').val() === "") {
    validated = false;
  }

  return validated;
}

function validate_name_six_chars() {
  var validated = true;

  if ($('#name').val().length < 6) {
    validated = false;
  }

  return validated;
}

function validate_password_six_chars() {
  var validated = true;

  if ($('#pass').val().length < 6) {
    validated = false;
  }

  return validated;
}

function validate_name_regex() {
  var validated = false;
  var check = /^[a-zA-Z]*$/;

  if (check.test($('#name').val())) {
    validated = true;
  }

  return validated;
}

function validate_mail_regex() {
  var validated = false;
  var check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/g;

  if (check.test($('#mail').val())) {
    validated = true;
  }

  return validated;
}

function validate_password_regex() {
  var validated = false;
  var check = /^[a-zA-Z0-9]*$/;

  if (check.test($('#pass').val())) {
    validated = true;
  }

  return validated;
}

function validate_password_same_confirm() {
  var validated = false;

  if ($('#pass').val() === $('#password_confirm').val()) {
    validated = true;
  }

  return validated;
}

function validate_form(e) {
  e.preventDefault();

  if (validate_name_empty() && validate_email_empty() && validate_password_empty() && validate_password_confirm_empty() && validate_name_six_chars() && validate_password_six_chars() && validate_password_same_confirm() && validate_name_regex() && validate_mail_regex() && validate_password_regex()) {
    document.getElementById('register_form').submit();
  } else {
    check_errors();
  }
}

function check_errors() {
  $('#name').removeClass('is-invalid');
  $('#nameErrors').empty();
  $('#mail').removeClass('is-invalid');
  $('#emailErrors').empty();
  $('#pass').removeClass('is-invalid');
  $('#passwordErrors').empty();
  $('#password_confirmation').removeClass('is-invalid');
  $('#passwordConfirmErrors').empty();

  if (!validate_name_empty()) {
    $('#name').addClass('is-invalid');
    $('#nameErrors').append('<div>Name is needed</div>');
  }

  if (!validate_email_empty()) {
    $('#mail').addClass('is-invalid');
    $('#emailErrors').append('<div>Email is needed</div>');
  }

  if (!validate_password_empty()) {
    $('#pass').addClass('is-invalid');
    $('#passwordErrors').append('<div>Password is needed</div>');
  }

  if (!validate_password_confirm_empty()) {
    $('#password_confirm').addClass('is-invalid');
    $('#passwordConfirmErrors').append('<div>Password confirmation is needed</div>');
  }

  if (!validate_name_six_chars()) {
    $('#name').addClass('is-invalid');
    $('#nameErrors').append('<div>Name need six characters or more</div>');
  }

  if (!validate_password_six_chars()) {
    $('#pass').addClass('is-invalid');
    $('#passwordErrors').append('<div>Password need six characters or more</div>');
  }

  if (!validate_password_same_confirm()) {
    $('#password_confirm').addClass('is-invalid');
    $('#passwordConfirmErrors').append('<div>Password and password confirmation need to be equals</div>');
  }

  if (!validate_name_regex()) {
    $('#name').addClass('is-invalid');
    $('#nameErrors').append('<div>Name only can have alphabetic characters</div>');
  }

  if (!validate_mail_regex()) {
    $('#email').addClass('is-invalid');
    $('#emailErrors').append('<div>Email need to be like: email@example.com</div>');
  }

  if (!validate_password_regex()) {
    $('#pass').addClass('is-invalid');
    $('#passwordErrors').append('<div>Password only can have alphanumeric characters</div>');
  }
}

/***/ }),

/***/ 1:
/*!**************************************************************!*\
  !*** multi ./resources/js/validations/registerValidation.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/javier/Sites/testforums/resources/js/validations/registerValidation.js */"./resources/js/validations/registerValidation.js");


/***/ })

/******/ });