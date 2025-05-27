<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::query()
            ->titleLike($request->input('title'))
            ->get();

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        return new TaskResource($task);

        return response()->json([
            'message' => 'Task created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        // タスクが存在しない場合
        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        // タスクが存在しない場合
        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }
        // タスクの更新
        $task->update($request->validated());
        return new TaskResource($task);
        return response()->json([
            'message' => 'Task updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        // タスクが存在しない場合
        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }
        // タスクの削除
        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully',
        ], 204);
    }
}
