<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        if ($user) {
            $tasks = Task::where('user_id', $user->id)
                         ->orderBy('id')
                         ->get();
        } else {
            $tasks = collect();
        }

        return Inertia::render('Tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date',
        ]);

        $user = auth()->user();

        if ($user) {
            Task::create([
                "title" => $request->title,
                "description" => $request->description,
                "category" => $request->category,
                "priority" => $request->priority,
                "deadline" => $request->deadline,
                "user_id" => $user->id,
            ]);
        }

        return redirect()->route('task')->with('success', 'Task added successfully.');
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return Inertia::render('Edit', ['tasks' => $tasks]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date',
        ]);

        $task = Task::findOrFail($id);
        $user = auth()->user();

        if ($user && $task->user_id === $user->id) {
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'priority' => $request->priority,
                'deadline' => $request->deadline,
            ]);

            return redirect()->route('task')->with('success', 'Task updated successfully.');
        }

        return redirect()->route('task')->with('error', 'You do not have permission to update this task.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $user = auth()->user();

        if ($user && $task->user_id === $user->id) {
            $task->delete();
            return redirect()->route('task')->with('success', 'Task deleted successfully.');
        }

        return redirect()->route('task')->with('error', 'You do not have permission to delete this task.');
    }
}
