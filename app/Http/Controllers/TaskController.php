<?php

namespace App\Http\Controllers;

use Response;
use Exception;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{

    /**
     * TaskController constructor
     *
     * @var $taskService
     */
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of resource
     *
     * @return Response
     */
    public function index()
    {
        try {
            $result = $this->taskService->getAll();
        } catch (Exception $e) {
            $result = [
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }

    /**
     * Store a newly created resource(task)
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        try {
            $result = $this->taskService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }

        return response()->json($result);
    }

    /**
     * Update task
     *
     * @param Request $request
     * @param $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        try {
            $result = $this->taskService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }

        return response()->json($result);
    }

    /**
     * Remove specified resource(task)
     *
     * @param $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->taskService->destroyById($id);
        } catch (Exception $e) {
            $result = [
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }
}