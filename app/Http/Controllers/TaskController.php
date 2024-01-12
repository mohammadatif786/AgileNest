<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Mail;
use App\Mail\TaskUpdateNotification;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->paginate(5);
        return view('viewtask', compact('tasks'));

    }//Index End Method

    public function create(){

        return view('createTask');

    }//End Task Create Mehod
    

    public function store(Request $request){
            
        // Insert data into the database
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('tasks.index');
      

    }//Store Task End Method

    public function edit($id){

        $data = Task::where('id',$id)->first();

        return view('editTask',compact('data'));

    }// End Task Edit Method

    public function update(Request $request, $taskId){

        Task::find($taskId)->update($request->all());

        $taskData = [
            'title' => 'Hello Employee',
            'body' => 'Task Updated',

        ];

        Mail::to('mohammadatif2468@gmail.com')->send(new TaskUpdateNotification($taskData));

        return redirect()->route('tasks.index');
        

    }// Update Task End Method

    public function destroy($taskid){

        Task::find($taskid)->delete();

        return back();

    }// Task Destory End Method

    public function search(Request $request){

        $search = $request->input('search');

        // Query tasks with search condition
        $tasks = Task::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('viewtask', compact('tasks'));

    }//Search End Method
}
