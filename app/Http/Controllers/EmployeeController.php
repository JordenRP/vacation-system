<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $vacations = Vacation::where('user_id', Auth::id())->get();
        $othersVacations = Vacation::where('user_id', '!=', Auth::id())->get();

        return view('employee.index', compact('vacations', 'othersVacations'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $vacation = new Vacation([
            'user_id' => Auth::id(),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'approved' => false,
        ]);

        $vacation->save();

        return redirect()->route('employee.index')->with('success', 'Отпуск успешно добавлен.');
    }

    public function edit(Vacation $vacation)
    {
        if ($vacation->approved) {
            return redirect()->route('employee.index')->with('error', 'Вы не можете редактировать утвержденный отпуск.');
        }

        return view('employee.edit', compact('vacation'));
    }

    public function update(Request $request, Vacation $vacation)
    {
        if ($vacation->approved) {
            return redirect()->route('employee.index')->with('error', 'Вы не можете редактировать утвержденный отпуск.');
        }

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $vacation->update([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('employee.index')->with('success', 'Отпуск успешно обновлен.');
    }
}

