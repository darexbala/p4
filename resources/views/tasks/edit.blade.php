@extends('layouts.master')

@section('head')
@stop

@section('title')
All books
@stop

@section('content')

<div class="panel-body">
    <form action="/task/edit" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" name='id' value='{{ $task->id }}'>
        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class='col-sm-6 error'>{{ $errors->first('description') }}</div>
            <div class="col-sm-6">
                <input
                type='text'
                id='description'
                name='description'
                value='{{ $task->description }}'
                class="form-control"
                >
            </div>
        </div>
        <div class="form-group">
            <label for="type_id" class="col-sm-3 control-label">Type of Task</label>

            <div class="col-sm-6">
                <select class="form-control" name='type_id' id='type_id'>
                    @foreach($types_for_dropdown as $type_id => $name)
                    <?php $selected  = ($task->type_id == $type_id) ? 'SELECTED' : '' ?>
                    <option value='{{$type_id}}' {{ $selected}}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="is_complete" class="col-sm-3 control-label">Completed?</label>

            <div class="col-sm-1">
                <input
                type='checkbox'
                id='is_complete'
                name='is_complete'
                class="form-control"
                {{ $task->is_complete == 1 ? 'CHECKED' : '' }}
                >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Update Task
                </button>
                <a href="/" class="btn btn-success">
                    <i class="fa fa-plus"></i> Cancel
                </a>
            </div>
        </div>
        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>
    </form>
</div>

@stop
