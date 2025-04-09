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
        $tasks = $user->Tasks()->orderBy('created_at', 'desc')->paginate(10);

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
        dd($request->all());


    }
}
