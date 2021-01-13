<?php

namespace App\Services;

use Validator;
use InvalidArgumentException;
use App\Repositories\TaskRepository;

class TaskService
{
    /**
     * @var $TaskRepository
     */
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->taskRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->taskRepository->getAllTask();
    }

    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->taskRepository->update($data, $id);

        return $result;
    }

    public function destroyById($id)
    {
        $task = $this->taskRepository->delete($id);

        return $task;
    }
}