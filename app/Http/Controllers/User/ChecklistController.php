<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Services\ChecklistService;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist)
    {
        // Sync checklist from admin
         // Sync checklist from admin
         (new ChecklistService())->sync_checklist($checklist, auth()->id());
        return view('users.checklists.show', compact('checklist'));
    }
}
