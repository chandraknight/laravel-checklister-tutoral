<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
{
       public function create():\Illuminate\Contracts\View\View
    {
        return view('admin.checklist_groups.create');
    }

    public function store(StoreChecklistGroupRequest $request):\Illuminate\Http\RedirectResponse
    {
        ChecklistGroup::create($request->validated());

        return redirect()->route('home');
    }

    public function edit(ChecklistGroup $checklistGroup):\Illuminate\Contracts\View\View
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }

    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup):\Illuminate\Http\RedirectResponse
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup):\Illuminate\Http\RedirectResponse
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
