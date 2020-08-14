<?php

namespace App\Http\Livewire\Reports;

use App\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $project_id;

    public function mount(string $project_id)
    {
        $this->project_id = $project_id;
        $this->fetchReports();
    }

    private function fetchReports()
    {
        $project = Project::find($this->project_id);

        return $project->reports()->paginate(5);
    }

    public function render()
    {
        $reports = $this->fetchReports();
        return view('livewire.reports.table', compact('reports'));
    }
}
