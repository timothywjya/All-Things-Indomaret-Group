$(document).ready(function() {
    var tododTable;

    tododTable = new $('#todoTable').DataTable({
        ajax: {
            url: 'get-data-todo',
            type: 'GET',
            dataType: "JSON",
            dataSrc: '',
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'todo',
                name: 'todo'
            },
            {
                data: 'todo',
                render: function(data, type, row) {
                    // return '<a class="btn btn-info" onclick="window.openModal(' + row.id + ',`' + row.todo + '`)">Edit</a><a class="btn btn-danger" onclick="deleteData(' + row.id + ',`' + row.todo + '`)">Delete</a>'
                    return '<button type="button" class="btn btn-info" id="btn-edit-todo" dataid="' + row.id + '" datatodo = "' + row.todo + '">Edit</button> <button type="button" class="btn btn-danger" id="btn-delete-todo" dataid="' + row.id + '" datatodo = "' + row.todo + '">Delete</button>'
                }
            },
        ]
    });

    $("#btn-add-todo").click(function() {
        $("#add-todo-modal").modal("toggle");
    });

    $("#btn-save-todo").click(function() {
        var task = $('#input-add-task').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: `/todos/create`,
            type: "POST",
            data: {
                todo: task
            },
            dataType: "JSON",
            success: function(data) {
                tododTable.ajax.reload();
                $("#add-todo-modal").modal("toggle");
            },
            error: function(response) {
                $('#taskError').text(response.responseJSON.errors.todo);
            }
        });
    });

    $(document).on("click", "#btn-edit-todo", function(e) {
        // console.log($(this).attr("dataid"));
        $("#modal-edit-todo").modal("toggle");
        $("#todo-id").val($(this).attr("dataid"));
        $("#input-edit-task").val($(this).attr("datatodo"))
    });

    $("#btn-update-todo").click(function() {
        var task = $('#input-edit-task').val();
        var id = $('#todo-id').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: '/todos/' + id,
            type: "PUT",
            data: {
                todo: task,
            },
            dataType: "JSON",
            success: function(data) {
                tododTable.ajax.reload();
                $('#modal-edit-todo').modal("toggle");
            },
            error: function(response) {
                $('#taskError').text(response.responseJSON.errors.todo);
            }
        });
    });

    $(document).on("click", "#btn-edit-todo", function(e) {
        // console.log($(this).attr("dataid"));
        $("#modal-edit-todo").modal("toggle");
        $("#todo-id").val($(this).attr("dataid"));
        $("#input-edit-task").val($(this).attr("datatodo"))
    });

    $(document).on("click", "#btn-delete-todo", function(e) {
        $("#todo-id").val($(this).attr("dataid"));
        var id = $('#todo-id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: '/todos/' + id,
            type: "DELETE",
            success: function(data) {
                tododTable.ajax.reload();
                $("#todo_" + id).remove();
            },
        });
    });

    // $("#btn-delete-todo").click(function() {
    //     console.log("test<<<<<<<<<<<<<<<<<<<<<<<<");
    //     var id = $('#todo-id').val();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
    //         },
    //         url: '/todos/' + id,
    //         type: "DELETE",
    //         data: {
    //             todo: task
    //         },
    //         success: function(data) {
    //             tododTable.ajax.reload();
    //             $("#todo_" + id).remove();
    //         },
    //         error: function(data) {
    //             $('#taskError').text(response.responseJSON.errors.todo);
    //         }
    //     });
    // })

    function addTodo() {

    }

    function deleteTodo(id) {
        // let token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: `/todos/${id}`,
            type: 'DELETE',
            // data: {
            // _token: token
            // },
            success: function(response) {
                $("#todo_" + id).remove();
            }
        });
    }

    function openModal(id, todo) {
        $("#todo_id").val(id);
        $('#edittask').val(todo);
        $('#editTodoModal').modal("toggle");

    }

    function deleteData(id, todo) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: `/api/todos/${id}`,
            type: 'DELETE',
            // data: {
            // _token: token
            // },
            success: function(response) {
                $("#todo_" + id).remove();
                location.reload();
                // window.reload.href="http://127.0.0.1:8000/home";
            },
            error: function(response) {
                $('#taskError').text(response.responseJSON.errors.todo);
            }
        });

    }


});