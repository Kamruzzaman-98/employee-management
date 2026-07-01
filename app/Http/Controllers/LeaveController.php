<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with(['employee','leaveType','approver'])
                    ->latest()
                    ->paginate(10);

        return view('leaves.index', compact('leaves'));
    }
}
