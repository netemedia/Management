<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function __invoke(Request $request) : View
    {
        return view('agenda');
    }
}
