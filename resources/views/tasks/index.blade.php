@extends('layouts.master')

@section('head')
@stop

@section('title')
All books
@stop

@section('content')

<div class="panel-body">

    <form action="/tasks" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Add a new Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
    </form>
    <h1>Tasks</h1>
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item"><a href="/tasks/{{ $task->id }}" class="badge">Edit</a> {{ $task->description }}</li>
        @endforeach
    </ul>
</div>

@stop
