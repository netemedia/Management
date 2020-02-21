<?php


namespace App\Http\View\Components;


use App\Task;
use Netemedia\Component\Component;

class LastTickets extends Component
{
    public string $title = 'Tickets récents';

    public function tasks()
    {
        return Task::orderBy('start_date', 'DESC')->paginate(10);
    }
}
