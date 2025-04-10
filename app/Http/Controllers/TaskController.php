<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $tasks = $user->Tasks()->orderBy('created_at')->paginate(10);

        $title = 'Главная';
        return view('task.index', compact('title', 'tasks'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->cant('create', Task::class)) {
            abort(403);
        }

        $title = 'Создание задачи';
        return view('task.create', compact('title'));
    }

    public function store(StoreTaskRequest $request)
    {
        $user = auth()->user();
//        dd($request->all());
        $task = Task::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        $user = auth()->user();
        if($user->cant('show', $task)){
            abort(403);
        }
        $title = "Просмотр задачи";
        return view('task.show', compact('task', 'title'));
    }

    public function change_status(Task $task)
    {
        $user = auth()->user();
        if ($user->cant('update', $task)){
            abort(403);
        }

        if($task->completed_at){
            $task->completed_at = null;
        }else{
            $task->completed_at = now();
        }
        $task->save();

        return redirect()->back();
    }
}
