'use strict'
var Application = {};
var ENTER_KEY = 13;
var ESC_KEY = 27;

(function (Application, $) {
    var doc,
        _$container,
        buffer,
        id = 0;

    Application.init = function () {
        doc = document;
        _$container = $('#todo-container');
        _$container.click($.proxy(this.onClickFunc, this));
        _$container.dblclick($.proxy(this.onDblClickFunc, this));
        _$container.keydown($.proxy(this.onKeyDown, this));
        _$container.focusout($.proxy(this.onFocusOut, this));
    };

    Application.onFocusOut = function (e) {
        if (e.target.hasAttribute('data-keypress-action')) {
            switch (e.target.getAttribute('data-keypress-action')) {
                case 'changeTask':
                    this.notChangeTask(e);
                    break;
            }
        }
    };

    Application.onClickFunc = function (e) {
        if (e.target.hasAttribute('data-click-action')) {
            switch (e.target.getAttribute('data-click-action')) {
                case 'clearChecked':
                    this.clearChecked(e);
                    break;
                case 'removeTask':
                    this.removeTask(e);
                    break;
                case 'toggleTask':
                    this.toggleTask(e);
                    break;
                case 'checkAll':
                    this.checkAll(e);
                    break;
            }
        }
    };

    Application.onDblClickFunc = function (e) {
        if (e.target.hasAttribute('data-dblclick-action')) {
            switch (e.target.getAttribute('data-dblclick-action')) {
                case 'editTask':
                    this.editTask(e);
                    break;
            }
        }
    };

    Application.onKeyDown = function (e) {
        if (e.target.hasAttribute('data-keypress-action')) {
            switch (e.target.getAttribute('data-keypress-action')) {
                case 'addTask':
                {
                    if (e.which === ENTER_KEY) {
                        this.addTask(e);
                    }
                }
                    break;
                case 'changeTask':
                {
                    if (e.which === ENTER_KEY) {
                        this.changeTask(e);
                    }
                    if (e.which === ESC_KEY) {
                        this.notChangeTask(e);
                    }
                }
                    break;
            }
        }
    };

    Application.toggleTask = function (e) {
        if (e.target.checked) {
            var flagCheck = true;
            $(e.target).next().addClass('checkedTask');
            $('ul#toDoList li').each(function () {
                if (!$(this).children('[type=checkbox]').prop('checked')) flagCheck = false;
            });
            if (flagCheck) {
                $('#checkAll').prop('checked', true);
            }
        }
        else {
            $(e.target).next().removeClass('checkedTask');
            $('#checkAll').prop('checked', false);
        }
    };

    Application.checkAll = function (e) {
        if (e.target.checked) {
            $('ul#toDoList li').each(function () {
                $(this).children('[type=checkbox]').prop('checked', true);
                $(this).children('label.task').addClass('checkedTask');
            });
        }
        else {
            $('ul#toDoList li').each(function () {
                $(this).children('[type=checkbox]').prop('checked', false);
                $(this).children('label.task').removeClass('checkedTask');
            });
        }
    };

    Application.addTask = function (e) {
        var $toDoList = $('#toDoList'),
            newTaskId = this.nextId(),
            $newTask = $('<li id ="' + newTaskId + '">'),
            taskData = $('#' + e.target.id).val();
        if (taskData) {
            $newTask.append('<input type="checkbox" class="toggle" data-click-action="toggleTask">');
            $newTask.append('<label class="task" data-dblclick-action="editTask" data-keypress-action="changeTask">' + taskData + '</label>');
            $newTask.append('<input type="text" class="task edit" data-dblclick-action="editTask" data-task-id="' + newTaskId + '" data-keypress-action="changeTask" value="' + taskData + '"">');
            $newTask.append('<input type="button" value="X" class="remove" data-click-action="removeTask" data-task-id="' + newTaskId + '">');
            $toDoList.append($newTask);
            $newTask.children('[type=text]').hide();
            $(e.target).val('');
            $('#checkAll').prop('checked', false);
        }
    };

    Application.removeTask = function (e) {
        $('#' + $(e.target).attr('data-task-id')).remove();
    };

    Application.clearChecked = function (e) {
        var $checkedBoxes = $('#toDoList li .toggle:checked');

        $checkedBoxes.parent().remove();

        $('#checkAll').prop('checked', false);
    };

    Application.editTask = function (e) {
        if (!$(e.target).hasClass('checkedTask')) {
            buffer = $(e.target).text();
            $(e.target).hide();
            $(e.target).next().show().val(buffer).focus();
        }
    };

    Application.changeTask = function (e) {
        if (!$(e.target).val())
            $('#' + $(e.target).attr('data-task-id')).remove();
        else {
            buffer = $(e.target).val();
            $(e.target).hide();
            $(e.target).prev().text(buffer).show();
        }
    };

    Application.notChangeTask = function (e) {
        $(e.target).hide();
        $(e.target).prev().text(buffer).show();
    };

    Application.nextId = function () {
        return 'id' + id++;
    };
})(Application, jQuery);
