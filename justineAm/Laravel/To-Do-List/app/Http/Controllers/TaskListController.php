<?php

namespace App\Http\Controllers;

use App\ListItem;
use App\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;

class TaskListController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([

            'name'=> 'required',
        ]);
        $name = $request->get('name');
        $list = new TaskList();
        $list->name = $name;
        $list->user_id = auth()->user()->id;
        $list->save();

        return redirect()->back();
    }

    public function show($list_id)
    {
        $taskList = Auth::user()->task_lists()->findOrFail($list_id);
        return view('tasks', compact('taskList'));
    }

    public function addTask(Request $request, $list_id)
    {

        $taskList = Auth::user()->task_lists()->findOrFail($list_id);

        $list_item = new ListItem();
        $list_item->task = $request->get('task');
        $list_item->list_id = $taskList->id;
        $list_item->user_id = Auth::user()->id;
        $list_item->save();

        return redirect()->back();
    }


    public function markTaskAsDone(Request $request, $list_id )
    {

        $list_item_id = $request->get('list_item_id');
        $is_done = $request->get('is_done');
        $list_item = Auth::user()->list_items()->findOrFail($list_item_id);
        $list_item->is_done = ! $is_done;
        $list_item->save();
        return redirect()->back();
    }

    public function destroy($list_id )
    {
        
        $list = TaskList::find($list_id);
       $list->delete();
        
        return redirect()->back();
    }
}
