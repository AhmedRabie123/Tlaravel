<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calculateController extends Controller
{
    public function get_result($mark)
    {
        dd(get_result($mark));
    }
}
