<table class="table">
    <thead class="table-head">
    <tr>
        <th class="table-title">Rapports</th>
        <td class="table-title">
            Actions
        </td>
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
            <td class="p-4">
                <a class="go" href="{{ route('reports.edit', $report) }}">
                    <i class="las la-pen"></i> Modifier
                </a>
                <form method="post" action="{{ route('reports.destroy', $report) }}">
                    @method('delete')
                    @csrf
                    <button class="go" type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce rapport ?');"><i class="las la-trash-alt"></i> Supprimer</button>
                </form>
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
