<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['tasks'] = Task::all();
        $tasks = Auth::user()->tasks;
        return view('task',['tasks' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "task_name" => "required"
        ]);

        try {
            \DB::beginTransaction();
            $user = User::findOrFail($request->user_id);
            $task = new Task;
            $task->task_name = $request->task_name;
            $task->user_id = $user->id; 
            // $request->user_id
            $task->save();
            \DB::commit();
            $request->session()->flash('success', "Successfully create task.");
            return redirect('task');
            // return redirect()->route("task.index");
        }
        catch (Exception $e){
            \DB::rollback();
            \Log::error($e);
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
        $data['tasks'] = task::find($id);
        return view('create',$data);
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
         $this->validate($request, [
            "task_name" => "required"
        ]);

        try{
            \DB::beginTransaction();
            $user = User::findOrFail($request->user_id);
            $task = Task::findorFail($id);
            $task->task_name = $request->task_name;
            $task->user_id = $user->id;
            $task->save();
            \DB::commit();
           $request->session()->flash('success', "Successfully updated task.");
            return redirect('task');
            }catch (Exception $e){
                \DB::rollback();
                \Log::error($e);
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            \DB::beginTransaction();
            $task = Task::findOrFail($id);
            $task->delete();
            // $task->destroy($id);
            \DB::commit();
            $request->session()->flash('success', "Successfully deleted your task.");
            return redirect()->back();
            // return redirect()->route("task.index");
        }
            catch (Exception $e){
                \DB::rollback();
                \Log::error($e);
            }
    }
}
