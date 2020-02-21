<section class="flex -mx-4">

    <div class="w-full bg-white rounded shadow mx-4">
        <div class="h-4"></div>

        <div class="px-4">
            <p class="text-base font-semibold text-gray-800">
                {{ $title }}
            </p>
        </div>

        <div class="h-2"></div>

        <table class="w-full table-auto">
            <thead class="font-semibold text-gray-700">
            <th class="p-4 text-left">Statut</th>
            <th class="p-4 text-left">Sujet</th>
            <th class="p-4 text-left">Resource</th>
            <th class="p-4 text-left">Date</th>
            </thead>
            <tbody class="border-t-2 border-solid border-gray-500">
            @foreach($tasks() as $task)
                <tr>
                    <td class="p-4">
                        @if($task->done)
                            <div class="bg-gradient-greens">Terminé</div>
                        @else
                            <span class="bg-gradient-reds rounded-sm text-white px-2 py-1 text-xs">Ouvert</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm">
                        @if($task->url)
                            <a class="text-blue-500 no-underline" href="{{ $task->url }}" target="_blank">
                                {{ $task->title }}
                            </a>
                        @else
                            {{ $task->title }}
                        @endif
                    </td>
                    <td class="p-4 text-sm">{{ $task->resource->first_name }}</td>
                    <td class="p-4 text-sm">{{ $task->moment }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    {{ $tasks()->appends(app('request')->all())->links() }}
                </td>
            </tr>
            </tfoot>
        </table>

        <div class="h-4"></div>
    </div>


</section>
