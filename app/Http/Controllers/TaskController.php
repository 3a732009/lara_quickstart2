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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('tasks.index');
    }

}
