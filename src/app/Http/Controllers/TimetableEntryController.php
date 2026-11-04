<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'title' => ['required'],
            'day' => ['required', 'integer', 'between:1,5', Rule::unique('timetable_entries')->where('period', $request->input('period'))],
            'period' => ['required', 'integer', 'between:1,6'],
            ], [
            'title.required' => '授業名を入力してください',
            'day.required' => '曜日は1〜5で入力してください',
            'day.integer' => '曜日は1〜5で入力してください',
            'day.between' => '曜日は1〜5で入力してください',
            'day.unique' => 'その曜日・時限にはすでに授業が登録されています',
            'period.required' => '時限は1〜6で入力してください',
            'period.integer' => '時限は1〜6で入力してください',
            'period.between' => '時限は1〜6で入力してください',
            ]);
        $room = $request->input('room');

        TimetableEntry::create([
            'day' => $request->input('day'),
            'period' => $request->input('period'),
            'title' => $request->input('title'),
            'room' => $room === '' ? null : $room,
        ]);

        return redirect('/entries');
    }

    public function edit(string $id)
    {
        $entry = TimetableEntry::findOrFail($id);

        return view('entries.edit', [
            'entry' => $entry,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $entry = TimetableEntry::findOrFail($id);

        $request->validate([
            'title' => ['required'],
        ], [
            'title.required' => '授業名を入力してください',
        ]);

        $room = $request->input('room');

        $entry->update([
            'title' => $request->input('title'),
            'room' => $room === '' ? null : $room,
        ]);

        return redirect('/entries');
    }

    public function destroy(string $id)
    {
        $entry = TimetableEntry::findOrFail($id);

        $entry->delete();

        return redirect('/entries');
    }
}
