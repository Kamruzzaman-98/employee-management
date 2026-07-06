<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::with('creator')->latest()->get();

        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'publish_date' => 'required|date',
            'expire_date' => 'nullable|date|after_or_equal:publish_date',
            'status' => 'required'
        ]);

        Notice::create([
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'expire_date' => $request->expire_date,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('notices.index')
            ->with('success', 'Notice created successfully!');
    }

    public function edit($id)
    {
        $notice = Notice::findOrFail($id);

        return view('notice.edit', compact('notice'));
    }
}
