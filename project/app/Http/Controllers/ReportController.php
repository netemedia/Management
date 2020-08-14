<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Project;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Project $project)
    {
        return view('reports.create', compact('project'));
    }

    public function store(Project $project, ReportRequest $request)
    {
        $validated = $request->validated();

        $project->reports()->create($validated);

        session()->flash('success', 'Le rapport a été créé avec succès !');

        return redirect()->route('projects.show', $project);
    }

    public function show(Report $report)
    {
        $periode = [$report->debut, $report->fin];
        $project = $report->project;
        $tasks = $project->tasks()->whereBetween('day', $periode)->get();

        return view('reports.show', compact('report', 'tasks'));
    }

    public function edit(Report $report)
    {
        dd('pouet');
        return view('reports.edit', compact('report'));
    }

    public function update(Report $report, ReportRequest $request)
    {
        $validated = $request->validated();

        $project->reports()->create($validated);

        session()->flash('success', 'Le rapport a été créé avec succès !');

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Report $report)
    {
        $report->delete();
    }
}
