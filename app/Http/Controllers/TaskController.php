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
        $tasks_count = $tasks->where('is_completed', false)->count();
        return view('tasks.index', compact('tasks', 'tasks_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => '1']); // Temporary user ID for testing
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->delete();
    //     return redirect()->route('tasks.index');
    // }

    /**
     * Toggle the completion status of the specified resource.
     */
    public function toggle(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        return response()->json([
            'success' => true,
            'is_completed' => $task->is_completed,
            'message' => 'Task toggled successfully'
        ]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully'
            ]);
        }

        return redirect()->route('tasks.index');
    }
}
