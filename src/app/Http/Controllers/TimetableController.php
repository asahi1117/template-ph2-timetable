<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
public function index()
{
    $mondays = DB::select('
        SELECT period, name, teacher, room
        FROM courses
        WHERE day = 1
        ORDER BY period
    ');

    $requiredCourses = DB::select('
        SELECT name, credits
        FROM courses
        WHERE required = true
        ORDER BY code
    ');

    return view('timetable', [
        'mondays' => $mondays,
        'requiredCourses' => $requiredCourses,
    ]);
}
}
