<?php

namespace App\Http\Controllers;

use Response;
use Exception;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * @var $taskService
     */
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * list of tasks page
     *
     * @return view
     */
    public function list()
    {
        return view('list_tasks');
    }

    /**
     * list of tasks
     *
     * @return view
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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }

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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }

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