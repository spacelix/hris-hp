<?php

namespace App\Http\Controllers;

use App\Models\Ulp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlpController extends Controller
{

    public function index()
    {
        $user = User::query()
            ->find(Auth::id())
            ->load('area');

        // dd($user);
        $ulps = Ulp::query()->latest()->paginate(12);
        return view('admin.ULP.index', [
            'user' => $user,
            'ulps' => $ulps
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $user = User::query()
            ->find(Auth::id())
            ->load('area');

        $request->validate([
            'name' => ['required']
        ]);

        Ulp::create([
            'user_id' => auth()->id(),
            'area_id' => $user->area->id,
            'name' => $name = $request->name,
            'slug' => Str::slug($name . '-' . Str::random(6))
        ]);

        flash()->addSuccess('Ulp Succesfully Added!');
        return redirect()->back();
    }
    public function show(Ulp $ulp)
    {
        return view('admin.ULP.show');
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, Ulp $ulp)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $ulp->update([
            'name' => $name = $request->name,
        ]);

        flash()->addSuccess('Ulp Succesfully Updated!');
        return redirect()->back();
    }
    public function destroy(Ulp $ulp)
    {
        $ulp->delete();
        flash()->addSuccess('Ulp Succesfully Deleted!');
        return redirect()->back();
    }
}
