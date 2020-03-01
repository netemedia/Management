<?php

namespace App\Http\Controllers;

use App\Http\Forms\ClientForm;
use App\Http\Forms\ResourceForm;
use App\Resource;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getWeek(Request $request) : array
    {
        if ( $dateQuery = $request->input('week') ) {
            $week = [
                Carbon::create($dateQuery)->startOfWeek(),
                Carbon::create($dateQuery)->startOfWeek()->addDays(1),
                Carbon::create($dateQuery)->startOfWeek()->addDays(2),
                Carbon::create($dateQuery)->startOfWeek()->addDays(3),
                Carbon::create($dateQuery)->startOfWeek()->addDays(4),
            ];
        }
        else {
            $week = [
                Carbon::now()->startOfWeek(),
                Carbon::now()->startOfWeek()->addDays(1),
                Carbon::now()->startOfWeek()->addDays(2),
                Carbon::now()->startOfWeek()->addDays(3),
                Carbon::now()->startOfWeek()->addDays(4),
            ];
        }

        return $week;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function getResource(Request $request)
    {
        if ( $resourceQuery = $request->input('resource') ) {
            $resource = Resource::where('id', $resourceQuery)->first();
        }
        else {
            $resource = Resource::first();
        }

        return $resource;
    }
}
