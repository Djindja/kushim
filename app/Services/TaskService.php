<?php

namespace App\Services;

use Validator;
use InvalidArgumentException;
use App\Repositories\TaskRepository;

class TaskService
{
    /**
     * TaskService constructor
     *
     * @var $TaskRepository
     */
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Store to database
     *
     * @param array $data
     *
     * @return String
     */
    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $result = $this->taskRepository->save($data);

        return $result;
    }

    /**
     * Get all tasks
     *
     * @return String
     */
    public function getAll()
    {
        return $this->taskRepository->getAllTask();
    }

    /**
     * Update task data
     *
     * @param array $data
     * @param $id
     *
     * @return String
     */
    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $result = $this->taskRepository->update($data, $id);

        return $result;
    }

    /**
     * Delete task by id
     *
     * @param $id
     *
     * @return String
     */
    public function destroyById($id)
    {
        $task = $this->taskRepository->delete($id);

        return $task;
    }
}