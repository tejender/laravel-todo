<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->completed = $request->input('completed', false); // set default value to false if not provided
    
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
}
    
public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}


public function update(Request $request, Task $task)
{
    $task->title = $request->input('title');
    $task->description = $request->input('description');
    $task->completed = $request->input('completed', false); // set default value to false if not provided

    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}
}
