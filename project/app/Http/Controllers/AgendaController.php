<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function __invoke(Request $request) : View
    {
        return view('agenda');
    }
}
