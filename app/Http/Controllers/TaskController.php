<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Mail\TaskAssigned;
use App\Mail\TaskStatusUpdated;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::with('user');

        if ($request->filled('date_from')) {
            $tasks->whereDate('deadline', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $tasks->whereDate('deadline', '<=', $request->date_to);
        }

        $tasks = $tasks->simplePaginate(4);
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $users = User::get();
        return view('tasks.create', compact('users'));
    }


    public function store(TaskStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['assigner'] = auth()->id();
        $task = Task::create($validated);

        Mail::to($task->user->email)->send(new TaskAssigned($task));

        return redirect()->route('tasks.index')->with('success', 'A task created and assigned to a user.');
    }

    public function updateStatus(UpdateStatusRequest $request, Task $task)
    {
        $task->status = $request->status;
        $task->save();

        if ($task->assigner) {
            $user = User::find($task->assigner);

            if ($user) {
                Mail::to($user->email)->send(new TaskStatusUpdated($task, $task->status));
            } else {
                Log::warning('The assigned user could not be found.', ['task_id' => $task->id]);
            }
        }

        return redirect()->route('tasks.index')->with('success', 'Task status updated.');
    }
}
