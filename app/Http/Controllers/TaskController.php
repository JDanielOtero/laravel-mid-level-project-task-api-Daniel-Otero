<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Task::all());
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => $task,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $task = Task::find($id);
        return response()->json($task, 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $task,
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['success' => true], 200);
    }
}
