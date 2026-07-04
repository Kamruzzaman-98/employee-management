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
}
