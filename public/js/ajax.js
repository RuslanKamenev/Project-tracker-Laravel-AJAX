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

/***/ "./resources/js/ajax.js":
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //Токены для AJAX запросов
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); //AJAX - переход н страницу добавления нового проекта

  $(document).on('click', '#add-new', function () {
    $.ajax({
      type: 'GET',
      url: '/create',
      data: {
        page: 'create'
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - добавление нового проекта в БД и переход на страницу с проектами

  $(document).on('click', '#add-project', function (e) {
    e.preventDefault();
    var title = $('#new-project-name').val();
    var description = $('#new-project-description').val();
    $.ajax({
      type: 'POST',
      url: '/',
      data: {
        title: title,
        description: description
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/',
            data: {
              page: 'back'
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  }); //AJAX - переходит на страницу всех проектов

  $(document).on('click', '#all-projects', function () {
    $.ajax({
      type: 'GET',
      url: '/',
      data: {
        page: 'back'
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - переход на страницу конкретного проекта

  $(document).on('click', '.project-id', function () {
    var projectId = $(this).children('input').val();
    $.ajax({
      type: 'GET',
      url: '/' + projectId,
      data: {
        projectId: projectId
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - пагинация проектов и задач

  $(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];

    if ($('.paginate-links').attr('id') === 'tasks-paginate') {
      var projectId = $('#edit-project').children('input').val();
      $.ajax({
        type: 'GET',
        url: '/' + projectId,
        data: {
          page: page,
          projectId: projectId
        },
        success: function success(data) {
          $('#page-body').html(data);
        }
      });
    } else if ($('.paginate-links').attr('id') === 'projects-paginate') {
      $.ajax({
        type: 'GET',
        url: '/',
        data: {
          page: page
        },
        success: function success(data) {
          $('#page-body').html(data);
        }
      });
    }
  }); //AJAX - переход на страницу редактирования проекта

  $(document).on('click', '#edit-project', function () {
    var projectId = $(this).children('input').val();
    $.ajax({
      type: 'GET',
      url: '/' + projectId + '/edit',
      data: {
        project_id: projectId
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - сохранение изменений после редактирования поста

  $(document).on('click', '#project-changes-save', function () {
    var projectId = $('.project-id').children('input').val();
    var projectTitle = $('#project-title').val();
    var projectDescription = $('#project-description').val();
    $.ajax({
      type: 'PUT',
      url: '/' + projectId,
      data: {
        id: projectId,
        title: projectTitle,
        description: projectDescription
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/' + projectId,
            data: {
              project_id: ''
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  }); //AJAX - Удаление проекта

  $(document).on('click', '#project-delete', function () {
    var projectId = $('.project-id').children('input').val();
    $.ajax({
      type: 'DELETE',
      url: '/' + projectId,
      data: {
        id: projectId
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/',
            data: {
              page: 'back'
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  }); //AJAX - переход на страницу редактирования задачи

  $(document).on('click', '.task', function () {
    var taskId = $(this).children('input').val();
    $.ajax({
      type: 'GET',
      url: '/tasks/' + taskId + '/edit',
      data: {
        project_id: taskId
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - добавление новой задачи в БД и переход на страницу проекта

  $(document).on('click', '#add-task', function (e) {
    e.preventDefault();
    var projectId = $('.project-id').children('input').val();
    var taskId = $('.task-id').children('input').val();
    var name = $('#task-name').val();
    var description = $('#task-description').val();
    var status = $('#task-status').val();
    var deadline = $('#task-deadline').val();
    if (deadline === undefined) deadline = '(NULL)';
    $.ajax({
      type: 'POST',
      url: '/tasks',
      data: {
        project_id: projectId,
        name: name,
        description: description,
        status: status,
        deadline: deadline
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/' + projectId,
            data: {
              project_id: ''
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  }); //AJAX - сохранение изменений после редактирования задачи

  $(document).on('click', '#task-changes-save', function () {
    var projectId = $('.project-id').children('input').val();
    var taskId = $('.task-id').children('input').val();
    var name = $('#task-name').val();
    var description = $('#task-description').val();
    var status = $('#task-status').val();
    var deadline = $('#task-deadline').val();
    if (deadline === undefined) deadline = '';
    $.ajax({
      type: 'PUT',
      url: '/tasks/' + taskId,
      data: {
        id: taskId,
        name: name,
        description: description,
        status: status,
        deadline: deadline
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/' + projectId,
            data: {
              project_id: ''
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  }); //AJAX - добавление новой задачи

  $(document).on('click', '#create-task', function () {
    var projectId = $('#project-id').children('input').val();
    $.ajax({
      type: 'GET',
      url: '/tasks/create',
      data: {
        page: 'create',
        projectId: projectId
      },
      success: function success(data) {
        $('#page-body').html(data);
      }
    });
  }); //AJAX - Удаление задачи

  $(document).on('click', '#task-delete', function () {
    var projectId = $('.project-id').children('input').val();
    var taskId = $('.task-id').children('input').val();
    $.ajax({
      type: 'DELETE',
      url: '/tasks/' + taskId,
      data: {
        id: taskId
      },
      success: function success(data) {
        if (data) {
          $.ajax({
            type: 'GET',
            url: '/' + projectId,
            data: {
              page: 'back'
            },
            success: function success(data) {
              $('#page-body').html(data);
            }
          });
        }
      }
    });
  });
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/ajax.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\js\ajax.js */"./resources/js/ajax.js");


/***/ })

/******/ });