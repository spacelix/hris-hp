<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::get();
        return view('superadmin.Area.index', [
            'areas' => $areas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $area = Area::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),

        ]);

        flash()->addSuccess('Area Succesfully Added!');
        return redirect()->back();
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $area->update([
            'name' => $name = $request->name,
        ]);

        flash()->addSuccess('Area Succesfully Updated!');
        return redirect()->back();
    }

    public function destroy(Area $area)
    {
        $area->delete();
        flash()->addSuccess('Area Succesfully Deleted!');
        return redirect()->back();
    }
}
