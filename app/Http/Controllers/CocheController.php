<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CocheController extends Controller
{
    public function index()
    {
        $coches = DB::table('coches')->get();
        return view('coches.index', compact('coches'));
    }
}