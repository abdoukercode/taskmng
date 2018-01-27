<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Return a paginated list of tasks.
     *
     * @return TaskResource
     */
    public function index()
    {
        $task= Task::latest()
              ->paginate(10);

        return TaskResource::collection($task);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Validate and save a new task to the database.
     *
     * @param Request $request
     * @return TaskResource
     */
    public function store(Request $request)
    {
        $task = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:10'
        ]);
        $task->user_id= Auth::user()->id;

        $task = Task::create($task);

        return new TaskResource($task);
    }

    /**
     * Fetch and return the Task.
     *
     * @param Task $task
     * @return TaskResource
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        
       

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return("successfuly deleted");
    }
}
