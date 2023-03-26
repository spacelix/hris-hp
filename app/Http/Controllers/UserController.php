<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate();
        return view('superadmin.User.index', [
            'users' => $users,
        ]);
    }
    public function create()
    {
        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        $areas = Area::all();
        return view('superadmin.User.create', [
            'roles' => $roles,
            'areas' => $areas,
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['mimes:png,jpeg,jpg'],
            'area_id' => ['required', 'exists:areas,id'],
        ]);

        $picture = $request->file('image');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->hasFile('image') ? $picture->storeAs(
                'images/users',
                time() . '.' . $picture->extension()
            ) : null,
            'area_id' => $request->area_id,
        ]);

        $user->assignRole($request->role);
        event(new Registered($user));

        flash()->addSuccess('User Succesfully Added!');
        return redirect()->route('roles.index');
    }
    public function show($id)
    {
        //
    }
    public function edit(User $user)
    {
        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        $areas = Area::all();
        return view('superadmin.User.edit', [
            'user' => $user,
            'roles' => $roles,
            'areas' => $areas,
        ]);
    }

    public function update(Request $request, User $user)
    {
        // $user = User::find($request->id);
        // dd($user);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'image' => ['mimes:png,jpeg,jpg'],
            'area_id' => ['required', 'exists:areas,id'],
        ]);

        $picture = $request->file('image');
        // $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'image' => $request->hasFile('image') ? $picture->storeAs(
                'images/users',
                time() . '.' . $picture->extension()
            ) : $user->image,
            'area_id' => $request->area_id,
        ]);

        // $user->syncRoles($request->role);

        flash()->addSuccess('User Succesfully Updated!');
        return redirect()->route('roles.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        flash()->addSuccess('User Succesfully Deleted!');
        return redirect()->route('roles.index');
    }
}
