<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::latest()->paginate(10);

        return view('holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('holidays.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'holiday_date' => 'required|date|unique:holidays,holiday_date',
            'type'          => 'required|in:National,Religious,Company',
            'description'   => 'nullable|string',
            'status'        => 'required|boolean',
        ]);

        Holiday::create($validated);

        return redirect()
            ->route('holidays.index')
            ->with('success', 'Holiday created successfully.');
    }

    public function edit(Holiday $holiday)
    {
        return view('holidays.edit', compact('holiday'));
    }

    public function update(Request $request, Holiday $holiday)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'holiday_date' => 'required|date|unique:holidays,holiday_date,' . $holiday->id,
            'type'          => 'required|in:National,Religious,Company',
            'description'   => 'nullable|string',
            'status'        => 'required|boolean',
        ]);

        $holiday->update($validated);

        return redirect()
            ->route('holidays.index')
            ->with('success', 'Holiday updated successfully.');
    }
}
