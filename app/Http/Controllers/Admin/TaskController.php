<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function store(StoreTaskRequest $request, Checklist $checklist):\Illuminate\Http\RedirectResponse
    {
        //
        $checklist->tasks()->create($request->validated());
        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }

    public function edit(Checklist $checklist, Task $task):\Illuminate\Contracts\View\View
        {
        return view('admin.tasks.edit', compact('checklist', 'task'));
    }

    public function update(StoreTaskRequest $request, Checklist $checklist, Task $task):\Illuminate\Http\RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }

    public function destroy(Checklist $checklist, Task $task):\Illuminate\Http\RedirectResponse
    {
        $task->delete();
        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }
}
