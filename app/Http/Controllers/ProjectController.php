<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Topic;
use Carbon\Carbon;


class ProjectController extends Controller
{
    public function progressReport()
    {
        $today = Carbon::today();

        $topics = Topic::all()->map(function ($topic) use ($today) {
            if ($today->between($topic->start_date, $topic->end_date)) {
                $topic->status = 'Đang thực hiện';
            } elseif ($today->gt($topic->end_date)) {
                $topic->status = 'Đã hoàn thành';
            } else {
                $topic->status = 'Chưa bắt đầu';
            }
            return $topic;
        });

        return view('projects.progress-report', compact('topics'));
    }
}