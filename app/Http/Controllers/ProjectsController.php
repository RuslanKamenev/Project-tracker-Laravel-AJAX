<?php

namespace App\Http\Controllers;

use App\Model\Projects;
use App\Model\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (empty( Auth::user())){
            return redirect()->route('login');
        }
        $userId = Auth::id();

        $projects = Projects::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);

        if (isset($_GET['page'])) {
            return view('projects.only_projects', compact('projects'));
        }
        else {
            return view('projects.index', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $item = (new Projects())->create($data);

        if ($item) {
            return TRUE;
        }
    }

    /**
     * Display the specified resource.
     *
     * @Get("/{id}")
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::find($id);
        $tasks = Tasks::where('project_id', $id)->orderBy('status', 'DESC')->paginate(3);

        return view('project.index',
            compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $project = Projects::find($id);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return boolean
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $project = Projects::find($id);
        $result = $project->update($data);

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
        $result = Projects::destroy($id);

        if ($result){
            return TRUE;
        }
    }
}
