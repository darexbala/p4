<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function getIndex() {
        $tasks = \App\Task::get();

        return view('tasks.index')->with('tasks',$tasks);
    }
}
