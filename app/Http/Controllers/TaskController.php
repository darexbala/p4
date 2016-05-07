<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function getIndex() {
        if(!\Auth::check()){
            return view('welcome');
        }
        $tasks = \App\Task::with('Type')->where('user_id', '=',\Auth::id())
            ->orderBy('is_complete','asc')->get();

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

        $data = $request->only('description','type_id');
        $data['user_id'] = \Auth::id();

        $task = \App\Task::create($data);
        $task->save();

        \Session::flash('message','Your book was added.');
        return redirect('/');
    }

    public function getEdit($id) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            \Session::flash('message','Task not found');
            return redirect('/');
        }
        if($task->user_id != \Auth::id()) {
            \Session::flash('message','You do not have access to edit that Task.');
            return redirect('/');
        }
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
        $task = \App\Task::find($request->id);
        $task->description = $request->description;
        $task->type_id = $request->type_id;
        if($request->is_complete) {
            if($request->is_complete == 'on') {
                $task->is_complete = 1;
            }
            else{
                $task->is_complete = 0;
            }
        }
        else{
            $task->is_complete = 0;
        }

        $task->save();
        \Session::flash('message',$task->description.' was updated.');
        return redirect('/');
    }

    public function getConfirmDelete($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            \Session::flash('message','Task not found');
            return redirect('/');
        }
        if($task->user_id != \Auth::id()) {
            \Session::flash('message','You do not have access to edit that Task.');
            return redirect('/');
        }
        return view('tasks.delete')->with('task', $task);
    }

    public function getDelete($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            \Session::flash('message','Task not found.');
            return redirect('/');
        }
        if($task->user_id != \Auth::id()) {
            \Session::flash('message','You do not have access to edit that Task.');
            return redirect('/');
        }
        $task->delete();

        \Session::flash('message',$task->description.' was deleted.');
        return redirect('/');
    }
}
