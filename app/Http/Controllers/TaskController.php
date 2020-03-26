<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Response;

class TaskController extends Controller
{
    public function getTasks(Request $request, $id = "")
    {
        $task = Task::with('category');

        // Only fetching those tasks which has category..
        $task = $task->whereHas('category', function ($q) {
            $q->where('category.deleted_at', '=', null);
        })->get();

        // If ID is provided then fetch specific task..
        if ($id) {
            $task = $task->find($id);
        }

        // Returning Response..
        if (!empty($task) && $task->count()) {
            $task = response($task, 200);
        } else {
            $task = response::json(['message' => 'No Task Found!'], 404);
        }

        return $task;
    }

    public function addTask(Request $request)
    {
        return Task::create($request->all());
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->update($request->all());
        } else {
            $task = response::json(['message' => 'Task Not Found!'], 404);
        }

        return $task;
    }

    public function completeTask(Request $request, $id)
    {
        $task = Task::find($id);

        if ($task) {
            // Toggling Task's completed status..
            $task->update(['is_completed' => !$task->is_completed]);
        } else {
            $task = response::json(['message' => 'Task Not Found!'], 404);
        }

        return $task;
    }

    public function deleteTask(Request $request, $id)
    {
        $task = Task::find($id);

        if ($task) {
            // Soft deleting tasks
            $task->delete();
            $res = response::json(['message' => 'Task deleted successfully'], 200);
        } else {
            $res = response::json(['message' => 'Error occurred while deleting Task'], 400);
        }

        return $res;
    }

}
