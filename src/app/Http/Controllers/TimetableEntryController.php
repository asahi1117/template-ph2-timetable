<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

class TimetableEntryController extends Controller
{
    public function index()
    {
        $entries = TimetableEntry::query()
            ->orderBy('day')
            ->orderBy('period')
            ->get();

        return view('entries.index', [
            'entries' => $entries,
        ]);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $room = $request->input('room');

        TimetableEntry::create([
            'day' => $request->input('day'),
            'period' => $request->input('period'),
            'title' => $request->input('title'),
            'room' => $room === '' ? null : $room,
        ]);

        return redirect('/entries');
    }
}
