<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
            if (Auth::user()->admin == false) {
            abort(403);
        }
        $users = User::all();
        return view("admin.indexuser", [
            "users" => $users
        ]);
        //  $data['users'] = User::all();
        // // return view('admin');
        //  return view('admin.indexuser',['admin.indexuser' => $users]);

    }
    public function indexTask()
    {
        if (Auth::user()->admin == false) {
            abort(403);
        }
        $tasks = Task::all();
        return view("admin.indextask", [
            "tasks" => $tasks
        ]);
        // $data['tasks'] = Task::all();
        // // $tasks = Auth::user()->tasks;
        // return view('task',['tasks' => $tasks]);

    }
     public function showCreateForm(Request $request)
    {
        return view("admin.userCreate");
    }

     protected function store(Request $request)
     
        {
             $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        try {
            \DB::beginTransaction();
            // $user = User::findOrFail($request->id);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            \DB::commit();
            $request->session()->flash('success', "Successfully create User.");
            return redirect()->route('admin.indexuser');
        }
        catch (Exception $e){
            \DB::rollback();
            \Log::error($e);
        }
    }

public function showCreateTask(Request $request, $id)
    {
       $user = user::findOrFail($id);
        return view("admin.taskcreate", [
            "user" => $user
        ]);
    }

    public function storeTask(Request $request, $id)
    {
        $this->validate($request, [
            "task_name" => "required"
        ]);

        try {
            \DB::beginTransaction();
            $user = User::findOrFail($request->id);
            $task = new Task;
            $task->task_name = $request->task_name;
            $task->user_id = $request->id; 
            $task->save();
            \DB::commit();
            $request->session()->flash('success', "Successfully create task.");
            return redirect()->route('admin.indextask');
            // return redirect()->route("task.index");
        }
        catch (Exception $e){
            \DB::rollback();
            \Log::error($e);
        }
        
    }

    public function showEditForm(Request $request, $id)
    {
         $user = User::findOrFail($id);
        return view("admin.useredit", [
            "user" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
            "name" => "required"
        ]);

        try {
            \DB::beginTransaction();
            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            \DB::commit();
            $request->session()->flash('success', "Successfully update User details.");
            return redirect()->route('admin.indexuser');
        } catch (Exception $e) {
            \DB::rollback();
            \Log::error($e);
        }
    }

    public function showEditTask(Request $request, $id)
    {
        // $data['tasks'] = task::find($id);
        // return view('create',$data);
        $task = Task::findOrFail($id);

        return view("admin.taskedit", [
            "task" => $task
        ]);
    }

    public function updateTask(Request $request, $id)
    {
        $this->validate($request, [
            "task_name" => "required"
        ]);

        try {
            \DB::beginTransaction();
            $user = User::findOrFail($request->user_id);
            $task = Task::findOrFail($id);
            $task->task_name = $request->task_name;
            $task->user_id = $request->user_id;
            $task->save();
            \DB::commit();
            $request->session()->flash('success', "Successfully update task.");
            return redirect()->route("admin.indextask");
        } catch (Exception $e) {
            \DB::rollback();
            \Log::error($e);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->delete();
            // $task->destroy($id);
            \DB::commit();
            $request->session()->flash('success', "Successfully deleted User.");
            return redirect()->back();
            // return redirect()->route("task.index");
        }
            catch (Exception $e){
                \DB::rollback();
                \Log::error($e);
            }
    }


    public function deleteTask(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $task = Task::findOrFail($id);
            $task->delete();
            // $task->destroy($id);
            \DB::commit();
            $request->session()->flash('success', "Successfully deleted Task.");
            return redirect()->back();
            // return redirect()->route("task.index");
        }
            catch (Exception $e){
                \DB::rollback();
                \Log::error($e);
            }
    }
}
