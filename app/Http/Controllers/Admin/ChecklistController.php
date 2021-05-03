<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller {

    public function create( ChecklistGroup $checklistGroup ):\Illuminate\Contracts\View\View {
        return view( 'admin.checklists.create', compact( 'checklistGroup' ) );
    }

    public function store( StoreChecklistRequest $request, ChecklistGroup $checklistGroup ):\Illuminate\Http\RedirectResponse {
        $checklistGroup->checklists()->create( $request->validated() );

        return redirect()->route( 'home' );
    }

    public function edit( ChecklistGroup $checklistGroup, Checklist $checklist ):\Illuminate\Contracts\View\View {
        $checklist->load( 'tasks' );
        return view( 'admin.checklists.edit', compact( 'checklistGroup', 'checklist' ) );
    }

    public function update( StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist ):\Illuminate\Http\RedirectResponse {
        $checklist->update( $request->validated() );

        return redirect()->route( 'home' );
    }

    public function destroy( ChecklistGroup $checklistGroup, Checklist $checklist ) {
        $checklist->delete();

        return redirect()->route( 'home' );
    }
}
