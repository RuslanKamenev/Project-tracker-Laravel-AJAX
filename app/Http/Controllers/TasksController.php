<?php

namespace App\Http\Controllers;

use App\Model\Tasks;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $projectId = $request->input()['projectId'];

        return view('task.create', compact('projectId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $item = (new Tasks())->create($data);

        if ($item) {
            return TRUE;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);

        return view('.task.edit', compact('task'));
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
        $data = $request->input();
        $task = Tasks::find($id);
        $result = $task->update($data);

        if ($result) {
            return TRUE;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return boolean
     */
    public function destroy($id)
    {
        $result = Tasks::destroy($id);

        if ($result){
            return TRUE;
        }
    }
}
