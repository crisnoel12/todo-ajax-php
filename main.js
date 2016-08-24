$(document).ready(function () {
    'use strict';

    // Reload display of todos list
    function reloadTodo(){
        $.ajax({
            url: 'crud/read.php',
            success: function(response){
                $('#todoList').html(response);
            }
        });
    }

    // Ajax for creating and updating todos
    $('form.ajax').on('submit', function(){
        event.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            method = that.attr('method'),
            name = $('input#todoName').val(),
            data = {name : name};

        // If input is empty, then do nothing
        if ($.trim(name) === '') {
            return false;
        }

        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response){
                $('.message').text(response);
                reloadTodo();
            }
        });

    });

    // Ajax for deleting a todo
    $('#todoList').on('click', '.delete-btn', function(){
        event.preventDefault();
        var that = $(this),
            url = that.attr('href'),
            method = 'get';
        $.ajax({
            url: url,
            type: method,
            success: function(response){
                $('.message').text(response);
                reloadTodo();
            }
        });
    });

});
