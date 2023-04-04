<?php

namespace App\Http\Controllers;

use App\Models\Ulp;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{

    public function index()
    {
        $pegawais = Pegawai::where('user_id', Auth::id())->get();
        $ulps = Ulp::where('user_id', Auth::id())->get();
        // dd($ulp);
        return view('admin.pegawai.index', [
            'pegawais' => $pegawais,
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
            'nama' => 'required',
            'nip' => 'required',
            'regu' => ['required', 'numeric'],
            'ulp_id' => 'required',
        ]);
        Pegawai::create([
            'user_id' => auth()->id(),
            'area_id' => $user->area->id,
            'nama' => $nama = $request->nama,
            'slug' => Str::slug($nama . '-' . Str::random(6)),
            'nip' => $request->nip,
            'regu' => $request->regu,
            'ulp_id' => $request->ulp_id,
        ]);

        flash()->addSuccess('Pegawai Succesfully Added!');
        return back();
    }
    public function show(Pegawai $pegawai)
    {
        //
    }
    public function edit(Pegawai $pegawai)
    {
        //
    }
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }
    public function destroy(Pegawai $pegawai)
    {
        //
    }

    public function filter(Request $request)
    {
        $ulp_id = request()->ulp_id;
        dd($ulp_id);
        $pegawais = Pegawai::query()
            ->where('ulp_id', $ulp_id)
            ->paginate();
        $ulps = Ulp::where('user_id', Auth::id())->get();
        return view('admin.pegawai.index', [
            'pegawais' => $pegawais,
            'ulps' => $ulps
        ]);
    }
}
