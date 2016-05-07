@extends('layouts.master')

@section('title')
    Delete Task
@stop

@section('content')
    <h1>Delete Task</h1>
    <p>Are you sure you want to delete your task <em>{{$task->description}}</em>?</p>
    <p><strong><a href='/task/delete/{{$task->id}}'>Yes, delete it.</a></strong></p>
    <p><a href='/task/{{$task->id}}'>No, I changed my mind.</a></p>
@stop
