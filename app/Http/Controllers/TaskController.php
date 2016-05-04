<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function getIndex() {
        if(!\Auth::check()){
            return view('welcome');
        }
        $tasks = \App\Task::with('Type')->get();
        $types_for_dropdown = \App\Type::typesForDropdown();

        return view('tasks.index')
            ->with('tasks',$tasks)
            ->with('types_for_dropdown',$types_for_dropdown);
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'description' => 'required|min:3',
            'type_id' => 'required'
        ]);
        $tasks = \App\Task::get();

        return view('tasks.index')->with('tasks',$tasks);
    }

    public function getEdit($id) {
        $task = \App\Task::find($id);
        $types_for_dropdown = \App\Type::typesForDropdown();

        return view('tasks.edit')
            ->with('task',$task)
            ->with('types_for_dropdown',$types_for_dropdown);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'description' => 'required|min:3',
            'type_id' => 'required'
        ]);
        $tasks = \App\Task::get();

        return view('tasks.index')->with('tasks',$tasks);
    }
}
