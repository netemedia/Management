<table class="table">
    <thead class="table-head">
    <tr>
        <th class="table-title">Rapports</th>
        <td class="table-title">
            <a class="go" href="{{ route('reports.create', $project_id) }}">
                Ajouter
            </a>
        </td>
    </tr>
    </thead>
    <tbody class="table-body">
    @foreach($reports as $report)
        <tr>
            <td class="p-4">
                <a class="go capitalize" href="{{ route('reports.show', $report) }}">
                    {{ $report->period }}
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td>
            {{ $reports->links() }}
        </td>
    </tr>
    </tfoot>
</table>
