<?php

namespace App\Http\Repositories\Interfaces;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function build(Request $request);
}