<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Routing\Controller;

class ManagerController extends Controller
{
    public function index()
    {
        $vacations = Vacation::all();
        return view('manager.index', compact('vacations'));
    }

    public function toggleApproval(Vacation $vacation)
    {
        $vacation->update(['approved' => !$vacation->approved]);
        return redirect()->route('manager.index')->with('success', 'Статус отпуска успешно изменен.');
    }
}
