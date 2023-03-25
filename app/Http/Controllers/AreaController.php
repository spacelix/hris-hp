<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::query();

        return view('superadmin.Area.index', [
            'areas' => $areas->paginate(),
        ]);
    }
}
