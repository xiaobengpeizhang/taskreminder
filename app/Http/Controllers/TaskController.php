<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id','=',Auth::user()->id)->get();
        return view('task.index',compact('tasks'));
    }

    public function store(TaskRequest $request){
        $task = Task::class;
        $data = [
          'user_id'=>Auth::user()->id
        ];

        $task::create(array_merge($request->all(),$data));
        return redirect('/task');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/task');
    }
}
