<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'filter' => ['in:completed,not_completed']
        ]);

        $filter = $request->input('filter');

        $user = auth()->user();

        $query = $user->Tasks()->orderBy('created_at', 'desc');
        switch ($filter) {
            case 'not_completed':
                $query->isNotCompleted();
                $header = 'Не выполненные задачи';
                break;
            case 'completed':
                $query->isCompleted();
                $header = 'Выполненные задачи';
                break;
            default:
                $header = 'Все задачи';
        }
        $tasks = $query->paginate(10)->withQueryString();

        $title = 'Главная';
        return view('task.index', compact('title', 'tasks', 'header'));
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

        $task = Task::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача успешно добавлена!');
    }

    public function show(Task $task)
    {
        $user = auth()->user();
        if ($user->cant('show', $task)) {
            abort(403);
        }

        $title = "Просмотр задачи";
        return view('task.show', compact('task', 'title'));
    }

    public function change_status(Task $task)
    {
        $user = auth()->user();
        if ($user->cant('update', $task)) {
            abort(403);
        }

        if ($task->completed_at) {
            $task->completed_at = null;
        } else {
            $task->completed_at = now();
        }
        $task->save();

        return redirect()->back();
    }

    public function edit(Task $task)
    {
        $user = auth()->user();
        if ($user->cant('update', $task)) {
            abort(403);
        }

        $title = "Изменение задачи: {$task->name}";
        return view('task.edit', compact('task', 'title'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->save();

        return redirect()->route('tasks.show', $task)->with('success', 'Изменение успешно сохранено!');
    }

    public function destroy(Task $task)
    {
        $user = auth()->user();
        if ($user->cant('delete', $task)) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
    }
}
