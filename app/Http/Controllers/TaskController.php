<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
        $this->middleware('isAdmin');
    }

    public function index(Request $request){
        // untuk menampilkan data dari suatu model atau resource
        // get all data

        if ($request->search) {
            // query string
           $task = Task::where('task', 'LIKE', "%$request->search%")
           ->paginate(5);

           return view('task.index', [
            'data' => $task
        ]);
        }

        $task = Task::paginate(5);
        return view('task.index', [
            'data' => $task
        ]);
    }

    public function show($id){
        // manggil data per-id (1 atau by id)
        // return $param;

        $task = Task::find($id);
        return $task ;       
    }

    public function store(TaskRequest $request){
        // tambah data / post

       

        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/task');
    }

    public function update(TaskRequest $request, $id){
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/task');
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();


        return redirect('/task');
    }

    // view
    public function create(){
        return view('task.create');
    }
    public function edit($id){
        $task = Task::find($id);
       return view('task.edit', compact('task'));
    }

   
}
