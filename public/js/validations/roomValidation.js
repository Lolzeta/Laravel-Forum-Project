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

/***/ "./resources/js/validations/roomValidation.js":
/*!****************************************************!*\
  !*** ./resources/js/validations/roomValidation.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener('DOMContentLoaded', function () {
  var boton = document.getElementById('saveRoom');
  boton.addEventListener('click', function (event) {
    event.preventDefault();

    if (validateNameExist() && validateLengthName() && validateLengthCreator() && validateCreatorExist() && validateCathegoryExist() && validateLengthCathegory() && validateDescriptionExist() && validateLengthDescription()) {
      document.getElementById("saveForm").submit();
    } else {
      checkAllValidations();
    }
  });
});

function validateLengthName() {
  var validated = false;
  var name = trim(document.getElementById('name').value);

  if (name.length >= 3) {
    validated = true;
  }

  return validated;
}

function validateNameExist() {
  var validated = true;
  var name = trim(document.getElementById('name').value);

  if (name === "") {
    validated = false;
  }

  return validated;
}

function validateLengthCathegory() {
  var validated = false;
  var cathegory = trim(document.getElementById('cathegory').value);

  if (cathegory.length >= 5) {
    validated = true;
  }

  return validated;
}

function validateCathegoryExist() {
  var validated = true;
  var cathegory = trim(document.getElementById('cathegory').value);

  if (cathegory === "") {
    validated = false;
  }

  return validated;
}

function validateLengthCreator() {
  var validated = false;
  var creator = trim(document.getElementById('creator').value);

  if (creator.length >= 5) {
    validated = true;
  }

  return validated;
}

function validateCreatorExist() {
  var validated = true;
  var creator = trim(document.getElementById('creator').value);

  if (creator === "") {
    validated = false;
  }

  return validated;
}

function validateLengthDescription() {
  var validated = false;
  var description = trim(document.getElementById('description').value);

  if (description.length >= 10) {
    validated = true;
  }

  return validated;
}

function validateDescriptionExist() {
  var validated = true;
  var description = trim(document.getElementById('description').value);

  if (description === "") {
    validated = false;
  }

  return validated;
}

function checkAllValidations() {
  var validated = false;
  var validatedName = true;
  var validatedCreator = true;
  var validatedCathegory = true;
  var validatedDescription = true;

  if (!validateNameExist()) {
    if (!document.getElementById('nameError')) {
      var error = document.createElement('div');
      error.setAttribute('id', 'nameError');
      error.innerHTML = "The room name is needed";
      document.getElementById('name').appendChild(error);
    } else {
      var _error = document.getElementById('nameError');

      _error.innerHTML = "";
      _error.innerHTML = "The room name is needed";
    }

    validatedName = false;
  }

  if (!validateLengthName()) {
    if (!document.getElementById('nameError')) {
      var _error2 = document.createElement('div');

      _error2.setAttribute('id', 'nameError');

      _error2.innerHTML = "The room name need to have three characters or more";
      document.getElementById('name').appendChild(_error2);
    } else {
      var _error3 = document.getElementById('nameError');

      _error3.innerHTML = "";
      _error3.innerHTML = "The room name need to have three characters or more";
    }

    validatedName = false;
  }

  if (!validateCreatorExist()) {
    if (!document.getElementById('creatorError')) {
      var _error4 = document.createElement('div');

      _error4.setAttribute('id', 'creatorError');

      _error4.innerHTML = "The room creator is needed";
      document.getElementById('creator').appendChild(_error4);
    } else {
      var _error5 = document.getElementById('creatorError');

      _error5.innerHTML = "";
      _error5.innerHTML = "The room creator is needed";
    }

    validatedCreator = false;
  }

  if (!validateLengthCreator()) {
    if (!document.getElementById('creatorError')) {
      var _error6 = document.createElement('div');

      _error6.setAttribute('id', 'creatorError');

      _error6.innerHTML = "The room creator need to have five characters or more";
      document.getElementById('creator').appendChild(_error6);
    } else {
      var _error7 = document.getElementById('creatorError');

      _error7.innerHTML = "";
      _error7.innerHTML = "The room creator need to have five characters or more";
    }

    validatedCreator = false;
  }

  if (!validateCathegoryExist()) {
    if (!document.getElementById('cathegoryError')) {
      var _error8 = document.createElement('div');

      _error8.setAttribute('id', 'cathegoryError');

      _error8.innerHTML = "The room cathegory is needed";
      document.getElementById('cathegory').appendChild(_error8);
    } else {
      var _error9 = document.getElementById('cathegoryError');

      _error9.innerHTML = "";
      _error9.innerHTML = "The room cathegory is needed";
    }

    validatedCathegory = false;
  }

  if (!validateLengthCathegory()) {
    if (!document.getElementById('cathegoryError')) {
      var _error10 = document.createElement('div');

      _error10.setAttribute('id', 'cathegoryError');

      _error10.innerHTML = "The room cathegory need to have five characters or more";
      document.getElementById('cathegory').appendChild(_error10);
    } else {
      var _error11 = document.getElementById('cathegoryError');

      _error11.innerHTML = "";
      _error11.innerHTML = "The room cathegory need to have five characters or more";
    }

    validatedCathegory = false;
  }

  if (!validateDescriptionExist()) {
    if (!document.getElementById('descriptionError')) {
      var _error12 = document.createElement('div');

      _error12.setAttribute('id', 'descriptionError');

      _error12.innerHTML = "The room description is needed";
      document.getElementById('description').appendChild(_error12);
    } else {
      var _error13 = document.getElementById('descriptionError');

      _error13.innerHTML = "";
      _error13.innerHTML = "The room description is needed";
    }

    validatedDescription = false;
  }

  if (!validateLengthDescription()) {
    if (!document.getElementById('descriptionError')) {
      var _error14 = document.createElement('div');

      _error14.setAttribute('id', 'descriptionError');

      _error14.innerHTML = "The room description need to have ten characters or more";
      document.getElementById('description').appendChild(_error14);
    } else {
      var _error15 = document.getElementById('descriptionError');

      _error15.innerHTML = "";
      _error15.innerHTML = "The room description need to have ten characters or more";
    }

    validatedDescription = false;
  }

  if (validatedName) {
    if (document.getElementById('nameError')) {
      document.getElementById('name').removeChild(document.getElementById('nameError'));
    }
  }

  if (validatedCreator) {
    if (document.getElementById('creatorError')) {
      document.getElementById('creator').removeChild(document.getElementById('creatorError'));
    }
  }

  if (validateCathegory) {
    if (document.getElementById('cathegoryError')) {
      document.getElementById('cathegory').removeChild(document.getElementById('cathegoryError'));
    }
  }

  if (validatedDescription) {
    if (document.getElementById('descriptionError')) {
      document.getElementById('description').removeChild(document.getElementById('descriptionError'));
    }
  }

  if (validatedName && validatedCreator && validateCathegory && validatedDescription) {
    validated = true;
  }

  return validated;
}

/***/ }),

/***/ 1:
/*!**********************************************************!*\
  !*** multi ./resources/js/validations/roomValidation.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/javier/Sites/testforums/resources/js/validations/roomValidation.js */"./resources/js/validations/roomValidation.js");


/***/ })

/******/ });