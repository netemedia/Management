<?php

namespace App\Http\Controllers;

use App\Project;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create(Project $project)
    {
        return view('reports.create', compact('project'));
    }

    public function store(Project $project, Request $request)
    {
        return $request;
    }

    public function show(Report $report)
    {
        $periode = [$report->debut, $report->fin];
        $project = $report->project;
        $tasks = $project->tasks()->whereBetween('day', $periode)->get();

        return view('reports.show', compact('report', 'tasks'));
    }

    public function destroy(Report $report)
    {
        $report->delete();
    }
}
