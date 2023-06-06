@extends('layouts.app')

@section('content')
<script src="{{ url('/js/home.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todo Settings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-success" id="btn-add-todo">Add Todo</button>
                </div>
            </div>

            <div class="row" style="clear: both;margin-top: 18px;">
                <div class="col-12">
                    <table id="todoTable" class="table data-table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Todo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add-todo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                ...
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-todo-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Todo</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2">Task</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="input-add-task" name="todo" placeholder="Enter task">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-todo">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-todo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Todo</h4>
            </div>

            <div class="modal-body">
                <input type="hidden" name="todo_id" id="todo-id">
                <div class="form-group">
                    <label for="name" class="col-sm-2">Task</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="input-edit-task" name="todo" placeholder="Enter task">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-update-todo">Save</button>
            </div>
        </div>
    </div>

    @endsection