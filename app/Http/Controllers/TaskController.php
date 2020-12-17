<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * 建立一個新的控制器實例。
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create($request->all());

        return redirect('/tasks');
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}
