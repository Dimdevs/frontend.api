<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public $view = 'admin.pages.users.';
    public $route = 'admin.users.';
    public $title = 'Management User ';
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
        // $this->middleware('roles:Super Admin');
        View::share('title', $this->title);
        View::share('route', $this->route);
        View::share('view', $this->view);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        View::share('breadcrumbs', [
            [$this->title, route($this->route . 'index')],
        ]);

        return view($this->view . 'index', [
            'datas' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view($this->view . 'create', [
            'role' => $request->role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->model->where('email', $request->email)->exists()) {
            return redirect()->back()->with('fail', 'Alamat email sudah digunakan.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $role = $request->user_role === '0' ? 'superadmin' : 'company';

        $data = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role,
        ]);

        $data->assignRole($role);

        return redirect()->route($this->route . 'index')->with('success', 'User telah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        return view('admin.users.show', [
            'data' => User::find($id),
            'role' => $request->role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        return view($this->view . 'edit', [
            'data' => User::find($id),
            'role' => $request->role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = User::find($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route($this->route . 'index')->with('success', 'Informasi user telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $data = User::find($id);
        $data->delete();

        return redirect()->route('admin.users.index')->with('success', 'User telah berhasil dihapus.');
    }
}
