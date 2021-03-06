<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    /**
     * @var Task
     */
    protected $task;

    /**
     * TaskRepository constructor
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Save task
     *
     * @param array $data
     */
    public function save($data)
    {
        $task = new $this->task;

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->user_id = Auth::user()->id;

        $task->save();
    }

    /**
     * Get all tasks
     *
     * @return Task $task
     */
    public function getAllTask()
    {
        return $this->task->where('user_id', Auth::user()->id)->get();
    }

    /**
     * Update Task
     *
     * @param array $data
     * @param $id
     *
     * @return Task $task
     */
    public function update($data, $id)
    {
        $task = $this->task->find($id);
        $task->title = $data['title'];
        $task->description = $data['description'];

        $task->update();

        return $task;
    }

    /**
     * Delete Task
     *
     * @param $id
     *
     * @return Task $task
     */
    public function delete($id)
    {
        $task = $this->task->find($id);
        $task->delete();

        return $task;
    }
}