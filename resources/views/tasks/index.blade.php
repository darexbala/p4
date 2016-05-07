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
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class='col-sm-6 error'>{{ $errors->first('description') }}</div>
            <div class="col-sm-6">
                <input type="text" name="description" id="description" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="type_id" class="col-sm-3 control-label">Type of Task</label>

            <div class="col-sm-6">
                <select class="form-control" name='type_id' id='type_id'>
                    @foreach($types_for_dropdown as $type_id => $name)
                         <option value='{{$type_id}}'>{{$name}}</option>
                     @endforeach
                </select>
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
